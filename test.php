<head>
  <title>Using Flatpickr</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
  
</head>
<body>
 <input type="text" id="rangeDate" placeholder="Please select Date Range" data-input>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <script>

$("#rangeDate").flatpickr({
    mode: 'range',
    dateFormat: "Y-m-d"
});
  </script>
</body>
