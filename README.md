# Company-Leave-System
### A system for manage company leave system based on HTML, Javascript, CSS, PHP, MySQL

## Required functions:
### 1. Authentication
A simple authentication and authorization with username and password is equired.

### 2. Normal user actions

a. Creating a leave request where people will fill these fields:

Start date (date)

End date (date)

Note (text)

Take a half day at the beginning of leave (boolean): users can choose to only take leave starting from the afternoon of the start date.

Take a half day at the end of leave (boolean): users can choose to start going back to work from the afternoon of the end date.

b. Canceling a leave request.

c. Viewing the list of leave requests.

d. Seeing their own leave statistics.

e. Leave left: Number of days left of annual leave.

### 3. Admin user actions
a. Managing public holidays: An editable list of public holidays of a specific year.

b. Rejecting or approving a request: Every leave request needs admin’s approval. If a user cancels their approved leave requests at a time after the start date, the cancellation needs to be approved by the admin.

c. Viewing all people’s leave requests and statistics.

### 4. Other requirements
a. Annual leave of absence is always 15 days.

b. Leave request states.

Created (when users create a leave request)

Created ---> Approved

Created ---> Rejected

Created ---> Canceled (user can do this)

Approved ---> Canceling (user can do this)

Canceling ---> Canceled

c. When admin go approving or rejecting a request they should see a short statistic of the issuer’s annual leave. The requests exceeds capacity will be highlighted.

d. For inputting public holidays on admin side you can personally choose it, it can be simple as a list of dates or more figurative with a selectable calendar.

e. If an employee takes leave on a weekend (Saturday or Sunday) or a public holiday, that day will not be counted in annual leave.

f. A calendar where you can show up public holidays and a list of people who are off on a day.

g. Each year could have a different number of days of annual leave, e.g: Admin can set 15 annual leave for the year 2019 while 17 for the year 2020.


## Usage: 
### 1. Install WAMP server on Windows and run it
WampServer installs automatically install Apache, PHP, MySQL on Windows
https://www.wampserver.com/en/

![1](https://user-images.githubusercontent.com/37478093/93093578-6cac8780-f6d3-11ea-9cbb-0a94754ed10c.png)

### 2. Download all files of this repo and unzip to WAMP 'www' folder
For example: E:\wamp64\www\company-leave-system

### 3. Import data into 'phpmyadmin' 
Go to 'http://localhost/phpmyadmin/', username is 'root', password is empty. On the left side create new database name as 'leave_system_db', and import data by selecting 'database/leave_system_db' file in 'company-leave-system' folder. You should see blow:

![2](https://user-images.githubusercontent.com/37478093/93093580-6d451e00-f6d3-11ea-966e-24863a177de6.png)
![3](https://user-images.githubusercontent.com/37478093/93093581-6d451e00-f6d3-11ea-8ca0-e630ba1d4b1c.png)

### 4. Open webpage form http://localhost/
Click 'company-leave-system' folder under 'Your Projects', you should see a log in page. You can log in as normal user: username: user, password: 123 or log in as admin: username: admin, password: 123, otherwise, you can sign up as a new user. After log in as normal, you should see:

![4](https://user-images.githubusercontent.com/37478093/93093560-69b19700-f6d3-11ea-8f9f-747dbfd66e51.png)


log in as admin, you should see:
![5](https://user-images.githubusercontent.com/37478093/93093567-6ae2c400-f6d3-11ea-9d99-48c6738c16d7.png)


### 5. Explore functions
#### Normal user: you can see how many annual leave you left. You can view your all leave request. You can view who is on leave on specific date. You can create new leave request (holidays are highlighted in the calendar). You can cancel your request.
![8](https://user-images.githubusercontent.com/37478093/93093575-6cac8780-f6d3-11ea-9ea4-af66eda96716.png)

#### Admin: You can response to all pending leave requests. You can view all employees information. You can add, delete holidays in calendars. You can view who is on leave at specific day.  
![6](https://user-images.githubusercontent.com/37478093/93093571-6b7b5a80-f6d3-11ea-8795-b2ba503a7472.png)
![7](https://user-images.githubusercontent.com/37478093/93093573-6c13f100-f6d3-11ea-9e37-8d9a2ef5ce73.png)

