<h1>Countries</h1>
<p class="form hide">
    <input type="text" value="" placeholder="code" name="country[code]"/>
    <input type="text" value="" placeholder="name" name="country[name]"/>
    <button class="create" title="Create" data-type="country">Create</button>
</p>
<p>
    <button title="Add new country" id="show">Add new country</button>
</p>
<table id='table' class='display'>
    <thead>
    <tr>
        <th>Code</th>
        <th>Name</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Code</th>
        <th>Name</th>
    </tr>
    </tfoot>
    <tbody>
    %content%
    </tbody>
</table>