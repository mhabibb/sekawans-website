<!DOCTYPE html>
<html lang="id">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('logos/favicon.ico') }}" type="image/x-icon">
  <title>Sekawan'S TB Jember</title>

  {{-- Font Awesome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
      iframe {
          width: 100%;
          min-height: 360px;
      }
      article .body img {
          width: 100% !important;
      }
      article .body a {
          white-space: pre-wrap;
          word-wrap: break-word;
          word-break: break-all;
          white-space: normal;
          /*display:block;*/
      }
  </style>
</head>

<body>
  <x-navbar />

  <main style="min-height: 50vh;">
    @yield('content')
  </main>

  <x-footer />

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  @yield('script')
  <script>
    let keyword = document.getElementById("keyword");
    let result = document.getElementById("searchResult");
    target = window.location.href.split('/');
    target = target[target.length-1];

    $(document).ready(function () {
        $(keyword).keyup(function () {
            $(result).addClass("d-none");
            if ($(keyword).val() != "") {
                $(result).removeClass("d-none");
                $.ajax({
                    type: "get",
                    url: "{{ route('search') }}",
                    data: 'search=' + $(keyword).val() + '&&target=' + (target),
                    // success: function (data) {
                    //   $(result).html(data);
                    //   console.log(data);
                    // },
                })
                .done(function(status) {
                  if (status.length > 0) {
                    html = ''
                    status.forEach((data) => {
                      url = "{{ route('infotbc.show', 'id') }}";
                      url = url.replace('id', data.id)
                      console.log(data);
                      html += `
                      <div class="border-bottom py-3">
                        <a href=`+ url +` class="text-decoration-none link-dark d-block">${data.title}</a>
                        <small class="text-muted">${data.category.name}</small>
                      </div>`
                      $('#searchList').html(html)
                    })
                  } else {
                    $('#searchList').html(`<div class="py-3 text-muted">Data tidak ditemukan</div>`)
                  }
                })
                .fail(function() {
                  alert("Terjadi kesalahan!")
                });
            } else {
              $.get("{{ route('search') }}", {}, function(data, status) {
                $('#searchList').html(data);
              })
            }
        });
    });

  </script>
</body>

</html>