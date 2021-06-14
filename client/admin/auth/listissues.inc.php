<?php

if (isset($_POST['search'])) {
    $user_id = $_POST['search'];
 
    if ($issues = listIssues($conn, $user_id)) {


?>

        <div class="table w-full p-2">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">

                        <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                            <div class="flex items-center justify-center">
                                Book ID
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                            <div class="flex items-center justify-center">
                                User ID
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                            <div class="flex items-center justify-center">
                                Admin ID
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                            <div class="flex items-center justify-center">
                                Date of Issue
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm  text-blue-800">
                            <div class="flex items-center justify-center">
                                Date of Return
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm  text-red-800">
                            <div class="flex items-center justify-center">
                                Fine
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($issue = mysqli_fetch_assoc($issues)) { ?>
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                            <td class="p-2 border-r"><?php echo $issue['b_no']; ?></td>
                            <td class="p-2 border-r"><?php echo $issue['borrower']; ?></td>
                            <td class="p-2 border-r"><?php echo $issue['issuer']; ?></td>
                            <td class="p-2 border-r"><?php echo $issue['date_of_issue']; ?></td>
                            <td class="p-2 border-r"><?php echo $issue['date_of_return']; ?></td>
                            <td id="fine" class="p-2 border-r"><?php
                                            $date1 = new DateTime($issue['date_of_return']);
                                            $date2 = new DateTime(date('Y-m-d'));
                                            $fine = 0;
                                            if($issue['returned'] === 0 && ($date2 > $date1)){                                              
                                            $interval = $date1->diff($date2);
                                            $fine = 1 * ($interval->days);
                                            echo 'Rs. '. 1*($interval->days);
                                             }
                                             else {
                                                 echo $issue['fine'];
                                                }   
                                                     ?></td>
                            <td>
                            <?php 
                            if ($issue['returned'] === 0){
                            echo "<form action='auth/return-books.inc.php' method='POST'>";
                            echo "<input type='hidden' name='fine' value='{$fine}'>";
                            echo "<input type='hidden' name='issue-id' value='{$issue['issue_id']}'>
                                    <input type='submit' class='bg-green-500 px-2 py-1 text-white hover:shadow-lg text-s font-thin' name='issue{$issue['issue_id']}' value='Return' />
                                </form>";}
                            else echo "<p class='text-green-600'>Returned</p>";
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
<?php }}
?>