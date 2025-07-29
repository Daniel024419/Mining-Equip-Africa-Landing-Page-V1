 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
     integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
 <style>
     .table-scroll tbody {
         display: block;
         max-height: 400px;
         /* Adjust this height */
         overflow-y: auto;
     }

     .table-scroll thead,
     .table-scroll tbody tr {
         display: table;
         width: 100%;
         table-layout: fixed;
         /* Keeps column widths consistent */
     }

     .table-scroll thead {
         width: 100%;
     }
 </style>
