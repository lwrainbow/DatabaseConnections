# Database Connections
<p><a href="http://lianxiao.dev.fast.sheridanc.on.ca/xiaoyu/DatabaseConnections/index.html">Try it</a></p>
<p>This project use SurveyWithSessions as base. Add database support for my forms.</p>
<ul>
    <li>Creat a home page, index.html, which gives the user several options:</li>
    <ul type="circle">
        <li>Add new person</li>
        <li>View Existing people</li>
        <li>Delete a person</li>
    </ul>
    <li>Create a table in cPanel that can hold all of the information from my form.</li>
</ul>

<h2>Add new person:</h2>
<p>Make a copy of index.php in SurveyWithSessions and call it "add_person.php". Add one new field to form called email. Validate it with regular expression. This will be used as a ‘primary key’ in our database.  Everyone should have a unique email address.</p>
<p>Once user submit a validated form free of errors, again, display their information again and give them two buttons on a new screen.</p>
<ul>
    <li>Button 1 – Save user to text file.</li>
    <li>Button 2 – Save user to database.</li>
</ul>
<p>After saved the person, thank them and direct them to the home page.</p>

<h2>View Existing People:</h2>
<p>First, ask user if they want to display someone from a file, or someone from the database.</p>
<ul>
    <li>If they say a file, ask them for a name.  Retrieve and display this person’s information. If the person does not exist, inform the user that this person does not exist.</li>
    <li>If they select the database option, display the first and last name of everyone in the database. Once the person selects a name, their information should displayed on a new screen.</li>
</ul>
<p>After displaying the user information, direct them back to the home page .</p>

<h2>Delete a Person</h2>
<p>Ask the user who they would like to delete.</p>
<ul>
    <li>If they say a file, ask them for a name. If the person does not exist, inform the user that this person does not exist.</li>
    <li>If they select the database option, display the first and last name of everyone in the database.  Once the person selects a name, you can delete them from the database and inform them if it succeeded or failed.</li>
</ul>
