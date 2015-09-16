# MobileCart
USC Curriculum CSCI 571 - Web Technologies Project

Project URL - http://cs-server.usc.edu:2390/MobileCart/Customer/CodeIgniter/assets/login.html

Project Video - https://www.youtube.com/watch?v=aZmkepUKuhs

- Developed e-commerce web service for mobile phones with employee and customer facing endpoints
- Employee side features include:
	- Add/Delete/Update Users
	- Users can be administrators/employees/managers with access privileges
	- Administrators manage users and their access control
  	- Employees maintain inventory of mobile phones, categories and their sales
	- Managers can view reports of products,sales, their orders and users

- Customer side features include:
	- Sign up new account
	- login and maintain login and cart session
	- Search products by name/categories, and view details
	- Add to cart and place order
	- Maintain list of orders
	- Handle Cross Site Scripting (XSS) attacks and SQL Injection

- Technical Details
	- Implemented using PHP, Apache, Code Igniter, HTML5, JavaScript, CSS
  	- Database: MySQL
	- PHP Framework: CodeIgniter
  	- Javascript Framework: Angular.js
	- JavaScript Libraries: jQuery, jQuery UI
	- Responsive UI using CSS media queries

- Database Details

	- Employee Side Tables
		- USERS
	 
		| Field        | Type          | Null | Key | Default | Extra          |
		|--------------|---------------|------|-----|---------|----------------|
		| UserID       | int(11)       | NO   | PRI | NULL    | auto_increment | 
		| Username     | varchar(50)   | NO   |     |         |                | 
		| Password     | varchar(200)  | NO   |     |         |                | 
		| UserType     | varchar(50)   | NO   |     |         |                | 
		| Firstname    | varchar(50)   | NO   |     |         |                | 
		| Lastname     | varchar(50)   | NO   |     |         |                | 
		| Gender       | varchar(50)   | NO   |     |         |                | 
		| DOB          | date          | NO   |     |         |                | 
		| Address      | varchar(200)  | NO   |     |         |                | 
		| ContactNo    | varchar(50)   | NO   |     |         |                | 
		| EmailAddress | varchar(50)   | NO   |     |         |                | 
		| Salary       | decimal(10,0) | NO   |     |         |                | 
	
		- OPERATINGSYSTEMS
		
		| Field             | Type         | Null | Key | Default | Extra          |
		|-------------------|--------------|------|-----|---------|----------------|
		| SystemID          | int(11)      | NO   | PRI | NULL    | auto_increment | 
		| SystemName        | varchar(50)  | NO   |     |         |                | 
		| SystemDescription | varchar(200) | NO   |     |         |                | 
		
		- BRANDS
	
		| Field            | Type         | Null | Key | Default | Extra          |
		|------------------|--------------|------|-----|---------|----------------|
		| BrandID          | int(11)      | NO   | PRI | NULL    | auto_increment | 
		| BrandName        | varchar(50)  | NO   |     |         |                | 
		| BrandDescription | varchar(200) | NO   |     |         |                | 
		
		- MOBILES
		
		| Field            | Type          | Null | Key | Default | Extra          |
		|------------------|---------------|------|-----|---------|----------------|
		| MobileID         | int(11)       | NO   | PRI | NULL    | auto_increment | 
		| MobileName       | varchar(50)   | NO   |     |         |                | 
		| Description      | varchar(100)  | NO   |     |         |                | 
		| Quantity         | int(11)       | NO   |     |         |                | 
		| Price            | decimal(10,0) | NO   |     |         |                | 
		| SystemID         | int(11)       | NO   | MUL |         |                | 
		| BrandID          | int(11)       | NO   | MUL |         |                | 
		| ScreenSize       | varchar(50)   | NO   |     |         |                | 
		| FrontCamera      | varchar(50)   | YES  |     | NULL    |                | 
		| RearCamera       | varchar(50)   | YES  |     | NULL    |                | 
		| RAM              | varchar(50)   | NO   |     |         |                | 
		| InternalMemory   | varchar(50)   | NO   |     |         |                | 
		| ExtendableMemory | varchar(50)   | YES  |     | NULL    |                | 
		| Bluetooth        | varchar(10)   | YES  |     | NULL    |                | 
		| GPS              | varchar(10)   | YES  |     | NULL    |                | 
		| Infrared         | varchar(10)   | YES  |     | NULL    |                | 
		| MainIcon         | varchar(50)   | YES  |     | NULL    |                | 
		| OtherFeatures    | varchar(300)  | YES  |     | NULL    |                | 
		
		- SALES
		
		| Field         | Type          | Null | Key | Default | Extra          |
		|---------------|---------------|------|-----|---------|----------------|
		| SalesID       | int(11)       | NO   | PRI | NULL    | auto_increment | 
		| MobileID      | int(11)       | NO   | MUL |         |                | 
		| StartDate     | date          | NO   |     |         |                | 
		| EndDate       | date          | NO   |     |         |                | 
		| PercentageOff | decimal(10,0) | NO   |     |         |                | 

	- Customer Side Tables 
		- CUSTOMER 
		
		| Field            | Type         | Null | Key | Default | Extra          |
		|------------------|--------------|------|-----|---------|----------------|
		| CustomerID       | int(11)      | NO   | PRI | NULL    | auto_increment |  
		| CustomerName     | varchar(50)  | NO   |     |         |                |  
		| Gender           | varchar(50)  | YES  |     | NULL    |                |  
		| Username         | varchar(50)  | NO   |     |         |                |  
		| Password         | varchar(50)  | NO   |     |         |                |  
		| Address          | varchar(200) | NO   |     |         |                |  
		| PinCode          | int(11)      | NO   |     |         |                |  
		| EmailAddress     | varchar(50)  | NO   |     |         |                |  
		| ContactNumber    | varchar(50)  | YES  |     | NULL    |                |  
		| CreditCardNumber | varchar(20)  | NO   |     |         |                |  
		| CreditCardName   | varchar(50)  | NO   |     |         |                |  
		| CreditCardExpiry | date         | NO   |     |         |                | 
		 
		 
		- CART 
		
		| Field      | Type        | Null | Key | Default | Extra          |
		|------------|-------------|------|-----|---------|----------------|
		| CartID     | int(11)     | NO   | PRI | NULL    | auto_increment |  
		| MobileID   | int(11)     | NO   | MUL |         |                |  
		| CustomerID | int(11)     | NO   | MUL |         |                |  
		| SaleID     | int(11)     | YES  | MUL | NULL    |                |  
		| Quantity   | int(11)     | NO   |     | 1       |                |  
		| Active     | varchar(20) | NO   |     | True    |                | 
		 
		 
		- ORDERS  
		
		| Field      | Type          | Null | Key | Default | Extra          |
		|------------|---------------|------|-----|---------|----------------|
		| OrderID    | int(11)       | NO   | PRI | NULL    | auto_increment |  
		| CustomerID | int(11)       | NO   | MUL |         |                |  
		| OrderTotal | decimal(10,2) | NO   |     |         |                |  
		| OrderDate  | date          | NO   |     |         |                | 
		 
		- ORDERITEMS 
		 
		| Field         | Type          | Null | Key | Default | Extra |
		|---------------|---------------|------|-----|---------|-------|
		| OrderID       | int(11)       | NO   | PRI |         |       |  
		| MobileID      | int(11)       | NO   | PRI |         |       |  
		| SaleFlag      | int(11)       | NO   | PRI |         |       |  
		| SaleID        | int(11)       | YES  | MUL | NULL    |       |  
		| OrderQuantity | int(11)       | NO   |     |         |       |  
		| MobilePrice   | decimal(10,2) | NO   |     |         |       | 
		 
		 
		- PRODUCTSUGGESTION 
		
		| Field         | Type    | Null | Key | Default | Extra |
		|---------------|---------|------|-----|---------|-------|
		| MobileID      | int(11) | NO   | PRI |         |       |  
		| OtherMobileID | int(11) | NO   | PRI |         |       |  
		| Counter       | int(11) | NO   |     | 1       |       |  
