<?php

require_once 'includes/Templater.php';

$page = new Templater("templates/main.tpl.php");    // Loading the template file
$page->title = "Downloads";
$page->head = "
    <style type=\"text/css\">
        .firstCol {
            width: 25%;
        }
    </style>
    ";
$page->set("body", "
	<h1>Downloads</h1>
        <h2>Visual Basic</h2>
        <p>I made these when I was a teenager, they are undocumented and error checking is minimal. I have 
        put these online on the offchance that someone may find them useful. These are all compiled Windows
        executables, requiring the Microsoft VB6 runtime available 
        <a href=\"http://www.microsoft.com/en-us/download/details.aspx?id=24417\">here</a>. 
        (Any recent Windows version should have these already)</p>
	
            
        <div class=\"description\">
            Artillery Calculator - Enter in a range and projectile starting speed and will calculate
            elevation angle you need to hit target, time of flight and greatest height projectile will
            achieve. Very simple model, assumes unpowered projectile, completely neglects air resistance
            etc.
        </div>
        <div class=\"clear\"></div>
        <div class=\"screenshot\"><img src=\"images/ArtilleryCalc.png\"></div>
        <div class=\"link\"><a href=\"downloads/Artillery Calculator.exe\">Artillery Calculator.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Find Factors - Enter in a number greater than zero and this program will find all pairs of
                whole numbers that multiply together to give the number you typed in.
            </div>
            <div class=\"screenshot\"><img src=\"images/FindFactor.png\"></div>
            <div class=\"link\"><a href=\"downloads/FindFactor.exe\">FindFactor.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                GOOK3 - Reads in small binary files and strips out non alphanumeric characters to leave
                human readable text. I think I made this originally for extracting the plain text out of 
                corrupted MS Word docs off my school floppy disks.
            </div>
            <div class=\"screenshot\"><img src=\"images/GOOK3.png\"></div>
            <div class=\"link\"><a href=\"downloads/GOOK3.exe\">GOOK3.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Number Converter - Calculates a list of numbers and converts them into their equivalent 
                unsigned binary, hexadecimal and octal.
            </div>
            <div class=\"screenshot\"><img src=\"images/NumberConverter.png\"></div>
            <div class=\"link\"><a href=\"downloads/Number%20Converter.exe\">Number Converter.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
               Pascal's Triangle - Generates Pascal's triangle up to the requested number of rows. 
            </div>
            <div class=\"screenshot\"><img src=\"images/PascalTriangle.png\"></div>
            <div class=\"link\"><a href=\"downloads/Pascal's Triangle.exe\">Pascal's Triangle.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Polynomial Calculator - Attempts to factorise and find solutions for both quadratic and
                cubic polynomials.
            </div>
            <div class=\"screenshot\"><img src=\"images/Polynomial.png\"></div>
            <div class=\"link\"><a href=\"downloads/Polynomial Calculator.exe\">Polynomial Calculator.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Series - Calculates the sum of n terms or sum to infinity of a mathematical series 
                given the coefficients.
            </div>
            <div class=\"screenshot\"><img src=\"images/Series.png\"></div>
            <div class=\"link\"><a href=\"downloads/Series.exe\">Series.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Simple Geometry - 
            </div>
            <div class=\"screenshot\"><img src=\"images/SimpleGeometry.png\"></div>
            <div class=\"link\"><a href=\"downloads/Simple_Geometry.exe\">Simple_Geometry.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Statistics - Actually quite useful for generating means, standard deviation etc
            </div>
            <div class=\"screenshot\"><img src=\"images/Statistics.png\"></div>
            <div class=\"link\"><a href=\"downloads/Statistics.exe\">Statistics.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                SUVAT Calculator - SUVAT's are the name I was taught in school for speed, distance,
                acceleration, time etc equations. This app will choose the correct equation to use
                given the information provided and work out the missing physical quantities.
            </div>
            <div class=\"screenshot\"><img src=\"images/suvatCalc.png\"></div>
            <div class=\"link\"><a href=\"downloads/Suvat Calculator.exe\">Suvat Calculator.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                Triangle Trigonometry - Uses standard trig (sine, cosine) to work out the missing angle
                or length of side in a right angled triangle.
            </div>
            <div class=\"screenshot\"><img src=\"images/Trig.png\"></div>
            <div class=\"link\"><a href=\"downloads/Triangle Trigonometry.exe\">Triangle Trigonometry.exe</a></div>
        <div class=\"clear\"></div>

            <div class=\"description\">
                m3u2filecopy - Opens playlists of type 'm3u', displays statistics and copies the files to
                another drive. I made this for copying MP3's onto my 256MB USB MP3 player when 256MB was the
                biggest you could get!
            </div>
            <div class=\"screenshot\"><img src=\"images/m3u2filecopy.png\"></div>
            <div class=\"link\"><a href=\"downloads/m3u2file2copy.exe\">m3u2file2copy.exe</a></div>
        <div class=\"clear\"></div>            
        <div>
	<h2>Java</h2>
        <p>Link to my github will be here</p>
        <h2>Other</h2>
        </div>
	");
/* Outputting the data to the end user */
$page->publish();