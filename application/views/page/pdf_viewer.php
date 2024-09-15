<!DOCTYPE html>
<html>
<head>
    <title>PDF Viewer</title>
</head>
<style>
        body, html {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

    iframe {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
<body>

    <iframe src="<?= base_url('/public/lampiran/'). $lampiranDTrx; ?>" width="100%" height="800px" allowfullscreen frameborder="0"></iframe>
</body>
</html>
