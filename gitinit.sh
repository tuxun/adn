#!/bin/bash 
# ^^ Bash, not sh, must be used for read options

echo "mise ajour du depot distant? [Entrée?]"

read -s -n 1 key  
if [[ $key = "" ]]; then 

# -s: do not echo input character.
# -n 1: read only 1 character (separate with space)

# double brackets to test, single equals sign, empty string for just 'enter' in this case...
# if [[ ... ]] is followed by semicolon and 'then' keyword
# ^^ Bash, not sh, must be used for read options


# double brackets to test, single equals sign, empty string for just 'enter' in this case...
# if [[ ... ]] is followed by semicolon and 'then' keyword
git config --global user.name "tuxun"
git config --global user.email "tuxuntrash@gmail.com"
git init
git remote add origin https://github.com/tuxun/adn.git
git pull origin master
read -s -n 1 key  
if [[ $key = "" ]]; then 
    echo 'You pressed enter!'
git add .
git status

    git commit -m 'nouvelleversion'
    git push -u origin master
else
    echo "exit...'"
fi 
fi 

