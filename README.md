<p align="center">
  <img src="public/imgs/logo.png" alt="Securiskan Logo"/>
</p>

# Securiskan

Securiskan is an innovative file scanning tool in active development, designed to detect malicious content such as viruses, malware, trojans, and other potential threats. With a powerful suite of scanning technologies and sophisticated detection algorithms, Securiskan aims to safeguard digital environments by providing thorough scans of files for any malevolent activities. We are dedicated to delivering comprehensive security solutions to protect individuals and organizations from digital harm.

## Features

- **Thorough Scanning**: Comprehensive checks against a database of known threats to identify malicious content.
- **Malware Detection**: Capable of detecting a broad spectrum of malware, viruses, trojans, and other security threats.
- **Detailed Reports**: Generation of detailed reports, outlining the nature of detected threats and recommended actions.
- **User-Friendly Interface**: A streamlined and intuitive interface for easy file uploads and scan management.
- **Real-Time Updates**: Regular updates to threat databases to ensure protection against emerging risks.

## How to Use

To utilize Securiskan's scanning capabilities, just follow these steps:

1. **File Upload**: Navigate to the Securiskan platform and upload the file you want to check for threats.
2. **Scanning Process**: Securiskan will thoroughly scan the file using its advanced detection algorithms.
3. **Review the Report**: After the scan, you'll receive a report detailing any detected threats and advice for next steps.

## Development Setup

For developers interested in testing or contributing to the project, please follow these setup steps to get started:

**Preparation**: Before building the project, it is essential to install the project dependencies. Run the following command in the project's root directory:
```
composer install
```
1. **Build the Project**: First, build the Docker images for the project by running:
```
docker-compose build
```
2. **Start the Services**: Once the build is complete, start the services using:
```
docker-compose up -d
```
3. **Database Migrations**: After the services are up, apply the database migrations to set up the necessary tables:
```
php artisan migrate
```
or
```
docker-compose exec app php artisan migrate
```
4. **Start the Project**: Finally, use Laravel's built-in server to start the project:
```docker-compose exec app php artisan serve
php artisan serve
```
or
```
docker-compose exec app php artisan serve
```
Ensure Docker and Docker Compose are installed on your machine before proceeding with the above steps.

## Contribution

We welcome contributions to Securiskan! If you have ideas on how to enhance its capabilities, don't hesitate to fork the repository, submit a pull request, or open an issue.

## License

Securiskan is made available under the MIT License. For more details, see the LICENSE file.

Developed with ❤️
