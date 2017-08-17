<?php
function sqlite_open($location)
{
    $handle = new SQLite3($location);
    return $handle;
}

function sqlite_close($dbhandle)
{
    $dbhandle->close();
}
function sqlite_query($dbhandle,$query)
{
    $array['dbhandle'] = $dbhandle;
    $array['query'] = $query;
    $result = $dbhandle->query($query);
    return $result;
}
function sqlite_fetch_array($result)
{
    $result = $result->fetchArray();
    return $result;
}
?>
