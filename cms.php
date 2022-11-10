<?include 'cms/before.php';

$row=mysql_fetch_row(mysql_query('SELECT COUNT(*) FROM responses WHERE response_affirm=0'));
if ($row[0]!=0) echo '<a class=main href=/cms/responses-new-list/ style="background: url(/pattern/images/comment_add.png) no-repeat">новые отзывы о турбазе</a><sup>(',$row[0],')</sup><br><br><br>';
else 
{
echo '<h2 class=h1 style="background: url(/pattern/images/comment_add.png) no-repeat">новые отзывы о турбазе</h2><br>';
}
include 'cms/after.php'?>
