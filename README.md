Presentation Video:
https://drive.google.com/file/d/1vBg-bXqcBbK0_zA91KqRmDY3zeF5d3kP/view?usp=sharing

================

# Car Rental Web Application

This is a comprehensive Car Rental Web Application built using Laravel, providing both Admin and Customer interfaces. The application allows admins to manage cars, rentals, and customers while enabling customers to browse and book cars for rent.

## Features

### Admin Interface
- **Manage Cars**: Admins can add, edit, and delete car details, including car name, brand, model, year of manufacture, car type, daily rent price, availability status, and car image.
- **Manage Rentals**: Admins can view and manage all car rentals with details such as rental ID, customer name, car details, rental start and end dates, total cost, and status (Ongoing, Completed, Canceled).
- **Manage Customers**: Admins can view and manage customer details including name, email, phone number, address, and rental history.
- **Dashboard Overview**: Displays important statistics such as the total number of cars, number of available cars, total rentals, and total earnings from rentals.
- **Email Notifications**: Sends an email notification to the admin when a car is rented.

### Customer Interface
- **Browse Cars**: Customers can view available cars with filters such as car type, brand, and daily rent price.
- **Make a Booking**: Customers can select a car, choose the rental start and end dates, and book the car, ensuring that the car is available for the chosen period.
- **Manage Bookings**: After logging in, customers can view their current and past bookings and cancel a booking if the rental has not started yet.
- **User Authentication**: Customers can sign up, log in, and log out. Middleware is used to protect routes, ensuring only logged-in users can book cars or view their booking history.

### Technical Features
- **Multiple Authentication**: Separate login systems for admins and customers, allowing distinct functionalities based on user roles.
- **Database Design**: Includes tables for users (admin, customers), cars, and rentals with appropriate relationships and constraints.
- **Email System**: When a car is rented, a detailed email notification is sent to both the customer and the admin.

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/car-rental-web-app.git
   cd car-rental-web-app
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   - Copy `.env.example` to `.env`
   - Update your database credentials in the `.env` file.

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Start the Development Server**
   ```bash
   php artisan serve
   ```

7. **Compile Assets**
   ```bash
   npm run dev
   ```

## Usage

### Admin Access
- Visit the `/admin` route to access the admin dashboard.
- Use the seeded credentials to log in as an admin.
  
### Customer Access
- Visit the home page and sign up as a customer to explore the customer interface.
- Browse available cars and make bookings after logging in.

## Project Structure

- **Frontend**: Built using Bootstrap and custom CSS for styling the user interface.
- **Backend**: Laravel for backend operations, database interactions, and business logic.
- **Database**: MySQL database with tables for users, cars, rentals, etc.

## Contributing

Contributions are welcome! Please follow these steps to contribute:
1. Fork the repository.
2. Create a new branch (`feature/your-feature`).
3. Commit your changes.
4. Push to the branch.
5. Create a Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries, please contact [mehedisarker379@gmail.com.com]
