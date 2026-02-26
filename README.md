# SSC-2013 Batch Iftar & Jersey Donation System

A simple Laravel-based donation collection system for SSC-2013 Batch of Government Islampur Nekjahan Pilot Model High School.

## Features

- **Public Landing Page**: Mobile-responsive donation page with form
- **Donation Options**: Iftar Mahfil (৳250), Jersey (৳250), or Both (৳500)
- **Jersey Customization**: Size, name, and number on jersey
- **Payment Methods**: bKash, Nagad, Rocket, Bank Account
- **Admin Panel**: 
  - Dashboard with collection summary
  - Manage receiving phone numbers
  - Manage jersey sizes
  - View and verify donations
  - Export donations to CSV

## Technology Stack

- Laravel 11
- MySQL 8
- Tailwind CSS v4
- Blade Templates
- Vite

## Installation

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL 8

### Setup Steps

1. **Clone or navigate to the project directory**
   ```bash
   cd ssc-batch-donation
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Update database configuration in `.env`**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ssc_2013_donation
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database**
   ```bash
   php artisan db:seed
   ```

8. **Build frontend assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Access the application**
    - Homepage: http://localhost:8000
    - Admin Login: http://localhost:8000/admin/login

## Default Admin Credentials

```
Email: admin@ssc2013.com
Password: admin123
```

**⚠️ Important**: Change the default admin password immediately after first login!

## Database Structure

### Tables

1. **admins** - Admin user accounts
2. **donations** - Donation records
3. **jersey_details** - Jersey customization details
4. **jersey_sizes** - Available jersey sizes (S, M, L, XL, XXL, etc.)
5. **phone_numbers** - Receiving phone numbers (bKash, Nagad, etc.)

## Usage

### For Donors

1. Visit the homepage
2. Select donation type (Iftar, Jersey, or Both)
3. Fill in personal information
4. If selecting Jersey, provide size and customization details
5. Enter payment information (sent from, sent to, transaction ID)
6. Submit the form
7. Save the reference ID for your records

### For Admins

1. Login at `/admin/login`
2. **Dashboard**: View total collections and recent donations
3. **Donations**: View, filter, verify, and export donations
4. **Phone Numbers**: Add/edit receiving numbers for payments
5. **Jersey Sizes**: Manage available jersey sizes

## Routes

### Public Routes
- `GET /` - Homepage with donation form
- `POST /donate` - Submit donation
- `GET /donation/success/{id}` - Success page

### Admin Routes
- `GET /admin/login` - Admin login page
- `POST /admin/login` - Process login
- `POST /admin/logout` - Logout
- `GET /admin/dashboard` - Dashboard
- `GET /admin/donations` - View all donations
- `GET /admin/donations/export` - Export to CSV
- `POST /admin/donations/{id}/verify` - Verify donation
- `GET /admin/phone-numbers` - Manage phone numbers
- `GET /admin/jersey-sizes` - Manage jersey sizes

## Customization

### Change Colors

Edit the color values in `resources/css/app.css`:

```css
@theme {
  --color-primary-600: #16a34a;  /* Green */
  --color-gold-500: #eab308;     /* Gold */
}
```

### Add Payment Methods

Login as admin and go to Phone Numbers section to add new receiving numbers.

### Add Jersey Sizes

Login as admin and go to Jersey Sizes section to add new sizes.

## Security Notes

- CSRF protection enabled on all forms
- Password hashing using Laravel's bcrypt
- SQL injection protection via Eloquent ORM
- Admin authentication with session guard
- Input validation on all forms

## Development

### Running in Development

```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite dev server (auto-reload)
npm run dev
```

### Running Tests

```bash
php artisan test
```

## Production Deployment

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
2. Run `composer install --optimize-autoloader --no-dev`
3. Run `npm run build`
4. Run `php artisan config:cache`
5. Run `php artisan route:cache`
6. Run `php artisan view:cache`
7. Set up proper web server (Nginx/Apache)
8. Configure SSL certificate

## Support

For issues or questions, contact the batch organizing committee.

## License

This project is created for SSC-2013 Batch internal use.

---

**Government Islampur Nekjahan Pilot Model High School**  
**SSC-2013 Batch**
