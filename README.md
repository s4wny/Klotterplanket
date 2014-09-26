<snippet>
<content>
# {Klotterplank}

Ett forum för att dela komentrer med sin klasskompisar. Upplagd för att lära ut SQL injection, XXS och ajax.

###Funktionalitet:
*Registrera sig (hashning) 
*Logga in (SQLi) 
*Klottra (XSS) 
*Visa klotter (Ajax) 

 
## Dependencies
 
jQuery 1.10.X
 
## Contributing
 
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D
 
## Structure

### Files
- /mysql/setup.sql
- /backend/ajax/getNewPosts.php
- /backend/login.php
		   register.php
		   search.php
- /css/style.css
- /js/action.js
	  jQuery-min-1.10.X.js

- show.php
- index.php
 
### Database

// Registrera sig

    id | user | password

// Klottra

id | user_id | comment | datetime

## Credits
 
*Andreas "s4wny" Wallström 
*Filip "25F7" Lindvall
 
## TODO

// Logga in (SQLi)  
// Registrera sig (hashning)  
// Visa alla klotter (XSS)  
// Klottra  
// Visa enstaka klotter (SQLi, ta ut databasen med alla lösenord)  

## License
 Free->for->all;

</content>
</snippet>