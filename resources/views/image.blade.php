@extends('layouts.master')

@section('title')
  Content
@endsection

@section('content')
  <h1>Upload Image</h1>
  <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label">Select Image</label>
      <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
  </form>

  @if (session('success'))
    <div class="alert alert-success mt-3">
      {{ session('success') }}
    </div>
  @endif

  @if ($imagePath)
    <div class="mt-3">
      <h2>Uploaded Image:</h2>
      <!-- Add a container for the image -->
      <div id="image-container" style="max-width: 100%; height: auto; overflow: hidden; text-align: center; position: relative; padding: 20px;">
        <!-- Scrollable wrapper -->
        <div id="image-wrapper" style="display: inline-block; overflow: auto; max-width: 100%; max-height: 500px;">
          <img id="uploadedImage" src="{{ asset($imagePath) }}" alt="Uploaded Image" style="max-width: 100%; height: auto; transform-origin: center;">
        </div>
      </div>

      <!-- Image Control Buttons -->
      <div class="image-controls mt-3" style="text-align: center;">
        <button type="button" class="btn btn-secondary" onclick="rotateImage(90)">Rotate Right</button>
        <button type="button" class="btn btn-secondary" onclick="rotateImage(-90)">Rotate Left</button>
        <button type="button" class="btn btn-secondary" onclick="zoomImage(1.1)">Zoom In</button>
        <button type="button" class="btn btn-secondary" onclick="zoomImage(0.9)">Zoom Out</button>
      </div>
    </div>
  @endif

  <!-- JavaScript for image controls -->
  <script>
    let currentRotation = 0;
    let currentZoom = 1;

    // Function to rotate the image
    function rotateImage(degrees) {
        currentRotation += degrees;
        document.getElementById('uploadedImage').style.transform = `rotate(${currentRotation}deg) scale(${currentZoom})`;
    }

    // Function to zoom the image
    function zoomImage(factor) {
        currentZoom *= factor;
        document.getElementById('uploadedImage').style.transform = `rotate(${currentRotation}deg) scale(${currentZoom})`;

        // Adjust the container size to avoid covering buttons
        document.getElementById('image-wrapper').style.width = `${currentZoom * 100}%`;
        document.getElementById('image-wrapper').style.height = `${currentZoom * 100}%`;
    }
  </script>
@endsection
