# Prerequisite

- Install [Docker](https://www.docker.com/)

Docker compose should be included. If not, you can run the following command line to install.
```
curl -L https://github.com/docker/compose/releases/download/1.24.1/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```

# Build
Run the following command in the project folder. (contains "docker-compose.yml" file)
```
docker compose build --pull --no-cache 
docker compose up -d
```

# Create Account
Visit [Register Page](http://localhost/register) to create your first user account.
For admin user, 
1. Access database container 
```
docker exec -it ozb_interview_task-database-1 bash
```
2. Login mysql server
```
mysql -u doctrine -p ozb
```
3. Add `ROLE_ADMIN` to the admin user
```
UPDATE users SET `roles` = '["ROLE_ADMIN", "ROLE_USER"]' WHERE email = "{your login email}";
```

# Add Product by admin panel
1. Login as an admin user in [Login Page](http://localhost/login)
2. Visit [Admin Panel](http://localhost/admin) 
3. Press `Add Product` to start adding new product

# Add Products by database import
You can import `.sql` file to the database
1. Put the `.sql` file to `/data` folder
2. Access database container 
```
docker exec -it ozb_interview_task-database-1 bash
```
3. Import to database
```
mysql -u doctrine -p ozb << /var/lib/mysql/{your file name}.sql
```

# For Demonstration
In `.env` file, you can update `PRODUCT_IMAGE_PATH` to decide where should the uploaded images of the product should be saved. It should be under the `public` folder.

In `/example` folder, 
- `ozb_table.sql` file: included sample products in `products` table and an admin user in `users` table.
- `product` folder: included uploaded images for the sample products. This folder should match value from `PRODUCT_IMAGE_PATH`

# Additional features:
## Email verification
In `.env` file, 
1. Replace `MAIL_DSN` with your mailer URL. 
2. Set `MAILER_ENABLED` = `true`
3. Customize the `MAILER_SENDER_EMAIL` and `MAILER_SENDER_NAME` to show who is sending the verification email. 
