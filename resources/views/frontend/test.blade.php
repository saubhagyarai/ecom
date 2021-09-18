<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Uppy</title>
    <link href="https://releases.transloadit.com/uppy/v1.26.0/uppy.min.css" rel="stylesheet">
  </head>
  <body>
    <div id="drag-drop-area"></div>

    <script src="https://releases.transloadit.com/uppy/v1.26.0/uppy.min.js"></script>
    <script>
      var uppy = Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area'
        })
        .use(Uppy.Tus, {endpoint: 'https://tusd.tusdemo.net/files/'})

        // console.log(uppy);
      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result)
      })
    </script>
  </body>
</html>
