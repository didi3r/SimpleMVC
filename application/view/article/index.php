<div class="container">
<table width="850" align="center">
    <tr>
        <th>Nombre</th>
        <th>Autor</th>
    </tr>
    <?php foreach ($articles as $article) : ?>
    <tr>
        <td align="center"><?php echo $article[0] ?></td>
        <td align="center"><?php echo $article[1] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>