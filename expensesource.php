<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Expenses Per Source</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
       <?PHP require_once 'scripts/tablebyfundingsource.php';
        require_once 'scripts/navbar.php';
        require_once 'scripts/sumfunding.php';?>
        <script type="text/javascript" src="js/downloadreport.js"></script>
    <body>
        <?PHP navbar();?>
        <div class='container'>
        <?PHP require_once 'scripts/expensebar.php';?>
        
        <h1>Expenses By Funding Source</h1>
        <p>The tables below summarize the licenses budgeted to the <a href="#operation">Operation</a>, <a href="#tech">Technology</a>, <a href="#its">ITS</a>, <a href="#CTE">CTE</a>, <a href="#open">Open Source</a>, and <a href="#unsorted">Unsorted</a> budgets.</p>
            
        <h2 id="operation">Library Operations Budget</h2>
        <?PHP tableByFundingSource('Operations');?>
        <p>Total Cost: <?PHP sumFunding('Operations');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('Operations')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=Operations'">Print</button>
        
        <h2 id="tech">Library Technology Budget</h2>       
        <?PHP tableByFundingSource('Technology');?>
        <p>Total Cost: <?PHP sumFunding('Technology');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('Technology')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=Technology'">Print</button>
        
        <h2 id="its">ITS Budget</h2>
        <?PHP tableByFundingSource('ITS');?>
        <p>Total Cost: <?PHP sumFunding('ITS');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('ITS')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=ITS'">Print</button>
        
        <h2 id="cte">CTE Budget</h2>
        <?PHP tableByFundingSource('CTE');?>
        <p>Total Cost: <?PHP sumFunding('CTE');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('CTE')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=CTE'">Print</button>
        
        <h2 id="open">Open Source</h2>
        <p>These entries are available through non-commercial licensing and do not require a budget source.</p>
        <?PHP tableByFundingSource('OpenSource');?>
        <p>Total Cost: <?PHP sumFunding('OpenSource');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('OpenSource')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=OpenSource'">Print</button>
        
        <h2 id="unsorted">Unsorted Expenses</h2>
        <p>These entries have not been assigned to a funding source.</p>
        <?PHP tableByFundingSource('Unsorted');?>
        <p>Total Cost: <?PHP sumFunding('Unsorted');?></p>
        <br>
        <button class="btn btn-default" onclick="downloadFundingSourceReport('Unsorted')">Download</button>
        <button class="btn btn-default" onclick="location.href='printerfriendly.php?report=funding_source&area=Unsorted'">Print</button>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    </body>

</html>
