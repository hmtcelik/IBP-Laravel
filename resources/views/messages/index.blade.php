<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Messages</title>
</head>
<body>
    
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card" id="chat1" style="border-radius: 15px;">
          <div
            class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <i class="fas fa-angle-left"></i>
            <p class="mb-0 fw-bold">Chat</p>
            <i class="fas fa-times"></i>
          </div>
          <div class="card-body">

            @forelse ($messages as $m)
              @if ($m->from == Auth::user()->email)
                <div class="d-flex flex-row justify-content-start mb-4">
                  <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI="
                    alt="avatar 1" style="width: 45px; height: 100%;">
                  <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                    <b>You</b>
                    <p class="small mb-0">
                      {{ $m->message }}
                    </p>
                  </div>
                </div>
              @else
                <div class="d-flex flex-row justify-content-end mb-4">
                  <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                  <b>{{ $m->from }}</b>
                  <p class="small mb-0">
                    {{ $m->message }}
                  </p>
                  </div>
                  <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI="
                    alt="avatar 1" style="width: 45px; height: 100%;">
                </div>
              @endif
            @empty
            @endforelse




            <form action="{{ route('save_message') }}" method="POST" enctype="multipart/form-data" class="form-outline">
              @csrf
              <input type="text" name="from" class="form-control" placeholder="Product Title" hidden value="{{ Auth::user()->email }}">
                <input type="text" name="to" class="form-control" placeholder="Product Title" hidden value="-1">
                <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                <button class="btn btn-success mt-2 float-right" type="submit" >Send Message</button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


</body>
</html>
