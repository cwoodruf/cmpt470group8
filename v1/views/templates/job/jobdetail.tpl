<h3>{$name|htmlentities}</h3>
{$errors}


<a href="index.php?action=jobmanagement/edit/{$jobID}">Edit</a><br />

<strong>Title</strong>: {$title}<br />
<strong>Url</strong>: <a href="{$url}" target="_blank">{$url}</a><br />
<strong>Time</strong>: {$time}<br />
<strong>Requirements</strong>: {$requirements}<br />

<strong>Street address</strong>: {$street_address}<br />
<strong>City</strong>: {$city}<br />
<strong>Country</strong>: {$country}<br />
<strong>Description</strong>: {$description}<br />

<strong>Visibility</strong>: {$visibility}<br />
<strong>Created</strong>: {$created}<br />

<a href="index.php?action=jobmanagement/delete/{$jobID}">Delete</a><br />
