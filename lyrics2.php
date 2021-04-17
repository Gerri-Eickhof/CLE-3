<?php
require_once 'lyricsovh.php';

if ($_GET) {
    $artist = $_GET['artist'];
    $title = $_GET['title'];

    // Zoek de tekst van een nummer.
    try {
        // Zet de data in Array met Json Parse.
        $res = json_decode(lyricsovh\LyricsAPI::search($artist, $title), true);
        $res['artist'] = $artist;
        $res['title'] = $title;
    } catch (lyricsovh\TimeoutException $e) {
        $res = array('error'=>$e->getMessage());
    } catch (lyricsovh\APIException $e) {
        $res = array('error'=>$e->getMessage());
    } catch (lyricsovh\LyricsNotFoundException $e) {
        $res = array('error'=>$e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lyrics finder</title>
    <meta charset="utf-8">
    <meta NAME="robots" CONTENT="noindex, nofollow">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/lyrics2.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Vind de de tekst van je favoriete nummer!</h1>
    </div>
    <form class="form-horizontal" metho="get">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="artist" class="col-sm-2 control-label">Artiest</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="artist" name="artist" placeholder="Artiest">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nummer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nummer">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Zoeken</button>
                    </div>
                </div>
            </div>
<!--             Zoek resultaat-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php if(isset($res)): ?>
                    <?php if(isset($res['error'])): ?>
                        <!-- Error message -->
                        <p class="text-danger"><?php echo $res['error']; ?></p>
                    <?php else: ?>
                        <!-- Lyrics gevonden -->
                        <h4><u><?php echo $res['title']; ?></u></h4>
                        <h5><?php echo $res['artist']; ?></h5>
                        <p><em><?php echo nl2br($res['lyrics']); ?></em></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </form>

</div>
</body>
</html>