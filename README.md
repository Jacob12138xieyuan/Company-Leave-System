# Company-Leave-System
### A system for manage company leave system based on HTML, Javascript, CSS, PHP, MySQL

## Requirements:
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

## Usage: 
### 1. Install WAMP server on Windows and run it
WampServer installs automatically install Apache, PHP, MySQL on Windows
https://www.wampserver.com/en/



### 2. Download all files of this repo and unzip to WAMP 'www' folder
For example: E:\wamp64\www\company-leave-system

### 3. Import data into 'phpmyadmin' 
Go to 'http://localhost/phpmyadmin/', username is 'root', password is empty. On the right side create new database name as 'leave_system-db', and import data by selecting 'database/leave_system_db' file in 'company-leave-system' folder. You should see blow:

### 4. Open webpage form http://localhost/
Click 'company-leave-system' folder under 'Your Projects', you should see a log in page. You can log in as normal user: username: user, password: 123 or log in as admin: username: admin, password: 123, otherwise, you can sign up as a new user. After log in as normal, you should see:


log in as admin, you should see:


### 5. Explore functions
Normal user: you can see how many annual leave you left. You can view your all leave request. You can view who is on leave on specific date. You can create new leave request (holidays are highlighted in the calendar). You can cancel your request.

Admin: You can response to all pending leave requests. You can view all employees information. You can add, delete holidays in calendars. You can view who is on leave at specific day.  
