# Scraping Items and Prices
Project made to allow you to scrape online store websites of your choice (currently still building on such options) and add them to a table where such items are scraped periodically for price monitoring/item availability

## Signup and Login System:
<img width="669" alt="login" src="https://github.com/SanjanaYasna/Proj1/assets/124063580/2e8f3151-7e1d-48e2-9d68-d6453fda6640">
<br> (designed with the help of Dave Hollingworth's video (https://www.youtube.com/watch?v=5L9UhOnuos0), files: start at signup.html. process-signup.php (logs login information in mysql for verification in login.php), database.php (connects to the user information database), login.php (login prompt). Go to ScrapetoCart/Signup.html to start and access the signup page. <br>

## Dashboard.html to choose stores to scrape: 
<img width="450" alt="dashboard" src="https://github.com/SanjanaYasna/Proj1/assets/124063580/1ccc9123-8fe1-4110-bad9-25676cba58b2">
<br> Gives several options for websites to scrape in Dashboard.html, which redirects to the respective files in the Scrape folder (Scrape/keyFoodsScrape.php for keyFoods, for example)

## Catalog System:
<img width="1792" alt="catalog" src="https://github.com/SanjanaYasna/Proj1/assets/124063580/47194949-6a75-4c91-a618-e3ab77d7b2c7">
<br> Search items to scrape after picking the store. This showcases keyFoodsScrape.html after looking up “cat litter” in its home page for item lookup, which has information processed by keyFoodsScrape.php that calls the python scraping function in keyFoods.py. There is also another tab called “Daily Scrape” described below. If one clicks on “add to scrapes” button for a select item, it will be added to the sql database (process done in addtoSql.php) under their user gmail for showing purposes in dailyScrape.php.
<br>

## Monitor Scraped Items/Prices:
<img width="947" alt="scrape" src="https://github.com/SanjanaYasna/Proj1/assets/124063580/ffa5c2e3-40ed-48b4-906b-ae179e4374a4">
<br> This is my daily scrape results for user named “root” on dailyScrape.php. Items probably make no sense since I was playing around with store values for KeyFoods for testing purposes. dialyScrape.php filters the sql table for entries that match user email and display it in a dynamic html table. Communicates with addtoSql.php to retrieve necessary info after connecting to datatable. 

