<?php 
                    include('../config/db.php');

                    // read all rows from database file
                    $sql = "SELECT * FROM membership_applications";
                    $result = $conn->query($sql);

                    // check if query executed
                    if (!$result){
                        die("Invalid query: " . $connection->error);
                    }
                ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>


                <div><?php echo $row['id']; ?></div>
                    <div><?php echo $row['full_name']; ?></div>
                    <div><?php echo $row['email']; ?></div>
                    <div><?php echo $row['status']; ?></div>



            <?php } ?>



########## WORKING PDF GENERATOR