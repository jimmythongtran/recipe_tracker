# recipe_tracker

This is the recipe tracker app I am making.

## Helpful Links
* [Markdown formatting](https://support.zendesk.com/hc/en-us/articles/203691016-Formatting-text-with-Markdown$)
* [Command line power user](http://wesbos.com/command-line-video-tutorials/), [so purty](https://www.screencast.com/t/oAfCwXbCx)
* [VIM GIFs](https://vimgifs.com/)
* [Controller's job](https://stackoverflow.com/questions/2080532/what-is-the-job-of-controller-in-mvc)
* [Making models for MySQL database](https://dev.mysql.com/doc/workbench/en/wb-getting-started-tutorial-creating-a-model.html)

## Technical advisor
* [Electra Chong](https://github.com/electrachong)

# Development log
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
