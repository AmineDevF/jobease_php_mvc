<!-- view/home.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>User List</title>
</head>
<body>
    <h1><?=$collections["data"]?></h1>
    
    <?php if (!empty($users)): ?>
        
        <ul id="userList">
            <?php foreach ($collections["users"] as $user): ?>
                <li><?php echo $user['username']; ?> - <?php echo $user['email']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
       
        <p>No users found.</p>
    <?php endif; ?>

    <button id="loadMore">Load More Users</button>
   <?php if($_SESSION['autoriser'] == "oui"):?>
   <h1> <?= $_SESSION['username']?> you alredy connected</h1> <span><a href="?route=logout">Logout</a></span>
   <?php else: ?>
       
 
   <a href="?route=login">Go To login Page</a>
   <?php endif; ?>
      
 

   
    
  

    <script type="text/javascript" src="/assets/js/script.js"></script>
</body>

</html>
