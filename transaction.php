<?php
$servername="localhost";
$username="root";
$password="";
$database="sparking";
$conn=mysqli_connect($servername,$username,$password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions | ibanking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iBanking</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <!-- Button trigger modal -->

              Fund Transfer
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fund Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="home.php" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sender</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="sender"
                          aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Receiver</label>
                        <input type="text" class="form-control" name="receiver" id="exampleInputPassword1" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" id="exampleInputPassword2" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transaction.php">Recent Transactions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Add Customer</a>
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="home.php" method="POST" autocomplete="off">
                      <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="name"
                          aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword4" class="form-label">Balance</label>
                        <input type="text" class="form-control" name="balance" id="exampleInputPassword4" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </li>

      </div>
    </div>
  </nav>
<table class="content-table">
    <thead>
      <tr>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>
        <th>Time of Transaction</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT * FROM `transactions` ORDER BY `timestamp` DESC";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        for($i=1;$i<=$num;$i++){
            $row=mysqli_fetch_assoc($result);
            echo "<tr>
            <td>".$row['sender']."</td>
            <td>".$row['receiver']."</td>
            <td>".$row['Amount']."</td>
            <td>".$row['timestamp']."</td>
            </tr>";
        }
        
        echo '</tbody>
        </table>';
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>
</html>