# KeyQuest E-commerce Website

![Website Screenshot](./src/resources/icons/logo.ico)

## Prerequisites

Before you begin, make sure you have Wampserver installed on your machine. If not, download it [here](https://www.wampserver.com/en/download-wampserver-64bits/).

## Getting Started

1. Clone the git repository using the command:

   ```bash
       git clone https://github.com/RusterX16/KeyQuest.git
   ```

2. Create a database on PHPMyAdmin called `keyquest`. You can change the name or manage it in the `/src/config` directory of the workspace.

3. Navigate to `/src/sql` directory and run `create_table.sql` and then `insert_data.sql` to add sample data to the SQL database.

4. Launch the app. If you're using PHPStorm, simply click on the browser thumbnail when editing the index.php. If you're using VSCode, install the PHP Live Server extension, right click on the `index.php`, and select "Open with Live Server".

## How to Use the Website

1. Create an account by pressing the login button at the top right corner.

2. Register. Your data will be stored in the database and your password will be securely hashed.

3. Now, you can browse and add products to the basket/favlist.

## Potential Issues

- Ensure you have installed Wampserver.
- Make sure you're using the correct PHP version (8.2). You can check this by running `php -v` in your terminal.
- Ensure the repository name is `KeyQuest` - it's case sensitive.
- Make sure your browser is up to date.
- If you encounter any other issues, please email the developer: EliottRuster@gmail.com

## Thanks for using KeyQuest!

We hope you enjoy using our e-commerce platform. If you find it
