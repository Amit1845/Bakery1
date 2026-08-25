# Bakery Shop (PHP + MySQL)

A simple bakery storefront with a public site (browse categories/products, leave
feedback) and an admin panel (manage categories/products, view feedback).

# Link Of the Website 
https://bakery1-production.up.railway.app/
## What changed in this cleanup

- **SQL injection fixed** across all files — every query that used to concatenate
  `$_REQUEST`/`$_POST`/`$_GET` directly into SQL now uses `mysqli` prepared
  statements.
- **Admin login** now uses `password_verify()` against bcrypt-hashed passwords
  (with a fallback check for legacy plaintext rows, so old dumps still work,
  but you should re-hash real credentials — see below).
- **Database credentials** moved out of source code and into environment
  variables (`conn.php` reads `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`,
  `MYSQLPASSWORD`, `MYSQLDATABASE` — these are exactly the variable names
  Railway's MySQL plugin provides automatically).
- **File uploads** (`admin/ProductAdd.php`, `admin/ProductEdit.php`) now go
  through `upload_helper.php`, which validates the file is actually an image
  (checked via MIME sniffing, not just the filename/extension), caps size at
  5MB, and saves it under a random filename — so someone can't upload a
  `.php` file disguised as a picture.
- **Output escaping** (`htmlspecialchars`) added on values that get echoed
  back into HTML (product/category names, feedback), to prevent stored XSS.
- Removed a couple of dead/broken code paths (`admin/CategoryAdd.php` had a
  leftover reference to a file upload that doesn't exist in its form;
  `admin/FeedbackDelete.php` included files that didn't exist in the project).

## Still worth doing before this is a "real" production app

These weren't changed, to keep the diff focused on the security-critical
stuff, but are good next steps:

- Add CSRF tokens to the admin forms (add/edit/delete category & product).
- Rate-limit or add a captcha to the login form and the public feedback form.
- Move product images to object storage (S3, Cloudinary, etc.) instead of
  local disk — see the deployment note below on why this matters.

## Local development

You need PHP (7.4+) with the `mysqli` extension, and a MySQL/MariaDB server.
Easiest path on Windows is **XAMPP**:

1. Install XAMPP, start Apache + MySQL.
2. Copy this folder into `htdocs/`.
3. Open phpMyAdmin, create a database (any name), and import
   `bakery_shop_db.sql`.
4. `conn.php` defaults to `localhost` / `root` / empty password / database
   `bakery_shop_db` when no environment variables are set — matching XAMPP's
   defaults. If you named your database something else, either rename it to
   `bakery_shop_db` or set an environment variable `MYSQLDATABASE` before
   starting Apache.
5. Visit `http://localhost/Backery_Shop/index.php`.
6. Admin panel: `http://localhost/Backery_Shop/admin/Login.php`
   

### Changing the admin password

Passwords are stored as bcrypt hashes now. To set a new one, run this PHP
snippet once (e.g. in a scratch file, or PHP's interactive shell `php -a`)
and put the result in the `password` column for that user:

```php
echo password_hash('your-new-password', PASSWORD_DEFAULT);
```

## Deploying to Railway

Railway hosts the PHP app and gives you a managed MySQL database in the same
project, connected by environment variables — no code changes needed beyond
what's already been done here.

**1. Push this project to GitHub**

Create a new repo and push this folder's contents (the `.gitignore` is
already set up).

**2. Create a Railway project**

- Go to railway.app, sign in, click **New Project**.
- Choose **Provision MySQL** to add a MySQL database service. Railway will
  generate `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`,
  `MYSQLDATABASE` automatically for that service.

**3. Import the database**

- Open the MySQL service in Railway -> **Data** tab (or **Connect** ->
  copy the connection command to use the `mysql` CLI locally, or use a GUI
  client like TablePlus/DBeaver pointed at the connection details Railway
  shows you).
- Run the contents of `bakery_shop_db.sql` against it to create the tables
  and seed data.

**4. Add the PHP service**

- In the same Railway project, click **New -> GitHub Repo** and pick the repo
  you pushed.
- Railway auto-detects PHP via Nixpacks and builds/runs it.
- Go to the PHP service's **Variables** tab and reference the MySQL
  service's variables (Railway lets you do this with `${{MySQL.MYSQLHOST}}`
  style references, or copy the values across manually): set `MYSQLHOST`,
  `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLDATABASE` on the PHP
  service so `conn.php` can find them.

**5. Deploy and test**

- Railway builds the app and gives you a public `*.up.railway.app` URL.
- Visit it, browse categories/products, submit the feedback form, and log
  into `/admin/Login.php` to confirm everything reads/writes to the database
  correctly.

**6. About file uploads on Railway**

Railway's filesystem is **ephemeral** — anything written to disk (like new
product images uploaded through the admin panel) will be lost on the next
redeploy or restart. The images already in `upload/` and committed to your
repo will always be there (since they're part of the deployed code), but any
*new* uploads via the admin panel won't survive a redeploy.

For a demo/portfolio deployment this is often fine — just know that if you
add products through the live admin panel, take that into account. If you
want uploads to persist long-term, the fix is to point `upload_helper.php`
at an object storage service (e.g. Cloudinary, AWS S3) instead of local disk
— happy to help wire that up if you want it later.
