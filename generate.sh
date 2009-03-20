#Clear the console. No junk please
clear

# GENERATOR FOR SSORM
# This makes generating models a breeze
# Comprable to script/generate scaffold in Rails
# Sample $sh generate Box boxes
# Will generate the scaffold for boxes. We aren't smart enough to figure out plurals!

#Global Variables
count=0

#Function Declaraions
#Pass in, Template, $class, $object, $table, $outputfile
makescaffold(){
    #Model
    sscaf "template/model_template.php" $1 $2 $3 "models/$2.php"

    #Controller
    sscaf "template/controller_template.php" $1 $2 $3 "controllers/$3_controller.php"

    #Views, index, show, edit, create
    mkdir "views/$3"
    #View:index
    sscaf "template/views/index.php" $1 $2 $3 "views/$3/index.php"
    #View:show
    sscaf "template/views/show.php" $1 $2 $3 "views/$3/show.php"
    #View:edit
    sscaf "template/views/edit.php" $1 $2 $3 "views/$3/edit.php"
    #View:create
    sscaf "template/views/create.php" $1 $2 $3 "views/$3/create.php"
}

sscaf(){
    cat $1 | sed "s/%C/$2/" | sed "s/%c/$3/" | sed "s/%t/$4/" > $5
    echo "Created file $5"
    #echo "$1, $2, $3, $4, $5"
}

#Generate migration stuff
#Adds the migration info to your config/db_tables.php file
makemigration(){
	#COMING soon
}

#Make sure there are enough arguments. Quit if there are too few.
if [ $# -lt 2 ] #if there are >1 argument
then
    echo "You need more parameters! At least two please"
    exit
fi

#setup the variables
class=$1
table=$2
object=`echo "$1" | tr [:upper:] [:lower:]`

#Make the file
#cat t1.txt | sed "s/%x/$class/" | sed "s/%y/$object/" | sed "s/%z/$table/" > "output/$object.txt"
#%C, %c, %t for class object and table
makescaffold $class $object $table

#print some output
echo "Class = $class, Table = $table, Object = $object"
#echo "The file looks like this:"
#cat "output/$object.txt"

#look at variables after the class names
#This will be useful for migration files
for arg in $@
do
    count=`expr $count + 1`
    if [ $count -gt 2 ]
    then
        makemigration $arg
    fi
done
