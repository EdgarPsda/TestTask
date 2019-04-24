# Welcome to TestTask
Creation of test task practice for CB.

## Installation   
1. Project   
  Open Terminal on ~/var/www/ folder and clone the project with the following command `git clone git@github.com:inEdgar/TestTask.git` 

2. Database   
  Import the `test_db.sql` file to MySql.   
  
## Using Test Task   
1. Open a browser and go to `localhost/TestTask` will be show the Home page.   
![Home](https://psdadev.com/TestTask/img/1.png)    

2. **To add a new interval**, select the date range in the two inputs and enter the price of that range, then click on **Add Interval** button.   
![Add Interval](https://psdadev.com/TestTask/img/2.png)

3. **To add another interval**, follow the same steps on #2 and the new interval will be added with some validations.   
![Add Interval](https://psdadev.com/TestTask/img/3.png)

![Add Interval](https://psdadev.com/TestTask/img/4.png)   

4. **To Delete** an interval, just click on the **Delete** link in the row of the interval.   
![Add Interval](https://psdadev.com/TestTask/img/5.png) 

5. **To Update** an interval, just click on the **Update** link in the row of the interval and will be show a form with the current range and price,
update the data then click on the **Update Interval** button.   
![Add Interval](https://psdadev.com/TestTask/img/6.png)

![Add Interval](https://psdadev.com/TestTask/img/7.png)


## Using Test Task API   
1. Using with Postman software, you can install it in the following link [Postman](https://www.getpostman.com/).   

2. **To Create** a new interval enter the following url `http://localhost/TestTask/API/interval/create.php` and send some array like
so
```Code
{
    "date_start" : "2019-04-25",
    "date_end" : "2019-04-26",
    "price" : "7"
}
```
Then click **Send** button.   
![Add Interval](https://psdadev.com/TestTask/img/8.png)   

3. **To Update** an interval, enter the following url `http://localhost/testTask/API/interval/update.php` and send array
with the new data like so   
```Code
{
    "id" : "5",
    "date_start" : "2019-04-27",
    "date_end" : "2019-04-29",
    "price" : "7"
}
```
![Add Interval](https://psdadev.com/TestTask/img/9.png)   

4. **To Delete** an interval, just enter the following url `http://localhost/testTask/API/interval/delete.php` and send 
array with the interval's id to delete.   
```Code
{
    "id" : "5"
}
```
![Add Interval](https://psdadev.com/TestTask/img/10.png)

## Using Online   
Also you can use Test Task online on the following url [Test Task Online](https://psdadev.com/TestTask/) and API url's   

**To Create Interval** `https://psdadev.com/TestTask/API/interval/create.php`   
**To Delete Interval** `https://psdadev.com/TestTask/API/interval/delete.php`   
**To Update Interval** `https://psdadev.com/TestTask/API/interval/update.php`   

Thank you for following my work and I really appreciate any suggestion.

