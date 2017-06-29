# recipe_tracker

This is the recipe tracker app I am making.

## Helpful Resources
* [Code Igniter User Guide](https://www.codeigniter.com/user_guide/)
* [Code Igniter Template](http://jeromejaglale.com/doc/php/codeigniter_template)
* [The Manga Guide to Databases](https://www.nostarch.com/mg_databases.htm)
* [Markdown formatting](https://support.zendesk.com/hc/en-us/articles/203691016-Formatting-text-with-Markdown$)
* [Command line power user](http://wesbos.com/command-line-video-tutorials/), [so purty](https://www.screencast.com/t/oAfCwXbCx)
* [VIM GIFs](https://vimgifs.com/)
* [Controller's job](https://stackoverflow.com/questions/2080532/what-is-the-job-of-controller-in-mvc)
* [Making models for MySQL database](https://dev.mysql.com/doc/workbench/en/wb-getting-started-tutorial-creating-a-model.html)
* [Loading models in MVC](https://stackoverflow.com/questions/7328188/how-to-load-model-into-a-controller-in-mvc)
* [Timed loops in PHP](https://stackoverflow.com/questions/10699762/timed-loop-in-php)
* [Parse errors not saving PHP files in VIM](https://stackoverflow.com/questions/6055880/is-it-possible-to-have-vim-prevent-the-saving-of-a-php-file-that-has-a-parse-err)
* [Add blank option to dropdown](https://stackoverflow.com/questions/32331198/how-to-add-a-default-blank-option-to-a-select-input-field-using-laravelcollectiv)
* [Format of Created at date](http://php.net/manual/en/function.date.php)
* [Secure Password & Keygen Generator](https://randomkeygen.com/)
* [The dot](https://stackoverflow.com/questions/10969342/parse-error-syntax-error-unexpected-expecting-or)
* [Redirect if session doesn't exist](https://stackoverflow.com/questions/19403687/redirect-if-session-doent-exist)
* [Duckett's HTML/CSS](https://www.amazon.com/HTML-CSS-Design-Build-Websites/dp/1118008189/ref=pd_lpo_sbs_14_t_1?_encoding=UTF8&psc=1&refRID=KN2BA88KY0H3R9SJR0CP)
* [Duckett's JavaScript](https://www.amazon.com/JavaScript-JQuery-Interactive-Front-End-Development/dp/1118531647)
* [Using get_where - CodeIgniter](https://stackoverflow.com/questions/1577365/codeigniter-get-where)
* [Upload images with PHP](https://www.formget.com/upload-images-using-php-and-jquery-via-form/)
* [Form_multipart](http://php.net/manual/en/features.file-upload.post-method.php)
* [Private functions](https://stackoverflow.com/questions/4361553/what-is-the-difference-between-public-private-and-protected)
* [Encapsulation](https://stackoverflow.com/questions/985298/what-is-encapsulation-with-simple-example-in-php)

## Technical advisor
* [Electra Chong](https://github.com/electrachong)

# Development log
### June 28, 2017
Stopping development to review my code and make sure I understand it. There are a lot of features I am not implementing: Make ingredients/steps re-orderable, deny user entry of bad data, edit/Update ingredients/steps, delete entire recipe, different authors (other than Jane Doe)/Users sign-in, deploy (put it online), but I want to take a step back and comprehend the build, because that was the main point of this project.

### June 27, 2017
Separation of concerns, creating different files for different parts of the app, really helped me debug this one. I knew deleting steps wasn't working, while deleting ingredients was working (showing that the Javascript was functionining), so the bug lied somewhere in steps...the Step_model! I didn't pass the `$id` through. Had I not practiced this separation (of concerns), debugging would have been like looking for a needle in a haystack. (Also important is to learn
how to speak idiomatically). Also, shout out to some productivity workflow tools (BetterSnapTool, Alfred). I added a note to the +Set Image feature about not being able to delete-but being able to replace the image, but it cluttered the single recipe view, so I hid it when you +Set image. UI FTW. Before you set the forest on fire, ask yourself, what, and then where is the problem exactly? Sortable() is an amazing function.
### June 26, 2017
Just learned Ultimate VIM has an autocomplete, at least for creating functions. Thought my JavaScript wasn't working, had to restart the server, clear browsing data and refresh (praise Phil). Cultivating good habits is one of the most important things I have learned working on this project, make a checklist to get oneself into said habits. Now, create the new upload_image action in Recipes controller that form references (so no 404). I also need to improve my command line skills because I do
inefficient commands like `cd ..` to navigate back a couple of times. We call a function private because we need to access it only within the controller. Ultimate VIM helped me catch an error thanks to its coloring (the missing closing sign). Having practiced writing for so many years helps in finding those little details. Spent a lot of time fixing my CSS, when it was simply a dot I was missing (to call .recipes-list). A lot of time is always spent looking for one small typo. In
life, things can slide - in programming, it's generally all, or nothing. Next up, I need to incorporate ability to delete, because, as the saying goes: NTTU ("Never Trust The User"). Can embed PHP code directly within JavaScript.
### June 25, 2017
Adding ability to upload an image. Need to add function to Recipe_model allowing us to update fields of existing entry (it's like running a MySQL db query). Forgot you can't add an empty directory to a repo. Add partial view for image.
### June 24, 2017
Now, we are starting with AJAX, after all-day debugging yesterday. After clearing the browser of browsing data, changes to Javascript show, now works as expected (praise Phil). Now adding the steps. Ending bracket comments is very necessary.
### June 23, 2017
For some reason, the "add recipe" button is aligned correctly, cool. Add both ingredients and steps, using AJAX. Glad I learned how to do :vsplit. Talk to Electra about deployment if I get everything to work locally. "get_where" basically says: "get all entries from the [ingredients/steps] table where the recipe_id equals $recipe_id." Retrieve recipe's ingredients within single action in Recipes controller. Now implement creation, add section to create small form at bottom of
ingredients. Adding Javascript, but need to get back to that green button. Ajax allows us to contact server-side code (PHP) without needing to submit form and reload page. Set up create_ingredient in Recipes controller. Adding JavaScript to handle form submission. Added submit actions. I broke the code! I spent the rest of the day fixing the +Add recipe button that brings up the form.
### June 22, 2017
Forgot to add flashdata change yesterday, should consider baking TODOs into code as comments. "The dot is a string concatenation operator." Human error again: missed `input` syntax, PHP was great in showing me on what line the error was. Now I can add recipes on the site and have it show on recent recipes! Adding "Add recipe" button to index page, but on wrong side. Button works now! Considering paying my technical debt later with the button realignment, it works, move on.
Added first TODO (search later). Pair programmer sure would be nice to catch human errors. Now, going to create a single recipe page to view a recipe's entire content. Start by creating a new view and custom route. Use CI's built-in routing. Create new action in Recipes controller. Adding "end of create" comment at the end of create function () helped me keep track of brackets, just added this to recipe_model too, will add this to other files with PHP moving forward. Tested accessing any single recipe page URL, works. Modifying single.php to check if it contains the ID value. So cool, passing php through HTML tag. Creating deadlines for the home stretch final week before presentation. Now, retrieve the designated recipe's info. Create custom function to spit out readable time. Make recipes clickable to single entry view.
### June 19/20, 2017
Multiple desktops is an asset. Establishing create action in recipes controller. Added form validation errors, missed a closing parentheses which drove me nuts. Didn't save recipes.php properly so had to re-code create function, Ultimate VIM even gave me a warning. CI provides form validation methods. Stupid human errors: missing underscores for variables. Added red validation errors. Being nosy led me to upgrade my development environment (thanks Colton and Wallee). It's great for the whole community when someone shares what they've built on Slack. Getting into the habit of constantly saving after any coding is important. Semicolon catches thanks to parse errors. Inserting recipes in recipe_model. Using CI's flashdata to show status message. Naming variables within the context of the app is very necessary. Added encryption key in config.php, but not committing.
### June 18, 2017
Semicolons rule the loops in PHP, thanks PHP parse errors. I think variables turn purple in Ultimate VIM when they are valid. Added hours and minute options in view, changed `array()` to aforementioned variables.

### June 17, 2017
Getting author entry (Jane Doe) to be listed in form's Author dropdown. Forgot to call `$data` - still not liking backend. Adding prep/cook times in the dropdowns, will fairly assume cook times take under a day, so the max time set will be 23 hours, 59 minutes. Parse errors (not commenting, foreach) didn't allow me to exit VIM's php files.
### June 14, 2017
Using CI's form helper to render the form's elements. Altered autoload.php to autoload the form help. Split panes because switching between tabs made it hard to stay focused. Created add.php - added form_inputs, form_dropdowns, astericks for required fields. Added recipe page in custom.css. Added controller action to access new view. Added function to Author_model to get all authors from database.

### June 11, 2017
Now, gotta add ability to add data within the app. Added fields to models. Made ingredient_model, author_model and Step_model files. I used a compound Unix command for the first time: `touch author_model.php && echo "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');" > author_model.php`

### June 7, 2017
Did not touch my development environment set-up from setting up yesterday (even sat in the same place in the cafe, at the same cafe), so got started immediately. Starting to comment parts of the build, considering doing this retroactively. Had a major error that took an hour to fix. In my recipe_model, I prematurely closed off the Recipe_model class after __construct, preventing my view from accessing get_all_entries. Then, I also didn't correctly close the get_all_entries loop as well. The PHP
error messages were helpful in helping me figure this out. I hate brackets. Had a strong urge to give up on the problem, glad I persisted and fixed it, could have derailed a 1-2 days of development. It was good I learned C, getting used to reading bracketed code. `git status` was helpful in me figuring out where I was in my workflow. Now, I can display input recipes with cooking time and the author's name.
### June 6, 2017
Spent time studying more UNIX (thanks ls -F). Spent much time simply re-setting up my environment. I want to find a one-click development set-up environment solution, but want to get back to the actual build. I spent time customizing my iTerm command line environment, which helps me clarify my workflow, so time well spent. There was a major Github outage at 4:19pm, which messed up my flow. I mainly modified recipe_model.php with a constructor and functions on 'getting' my first and all (db)
recipe entries.

### June 2, 2017
Decided on using README as the place to document the development, more expansive than commit messages.
