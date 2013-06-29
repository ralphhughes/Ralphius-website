<?php

    require_once 'includes/Templater.php';

    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    $page->title = "Old 386 robot";
    $page->head = "";
    $page->set("body", "
<h1>Ancient 386 robot</h1>
<p align=\"left\">
This page is a diary of progress on my robot. Entries are in 
chronological order with the most recent at the bottom of the
page <A HREF=\"#bottom\">here</A>.<BR>
<B>Primary Design Specifications</B><BR>
<LI>Enough power and ground clearance to negotiate my garden
<LI>Platform strong enough to support extra weight as more things added
<LI>Built around 386 motherboard so I can program it in QBasic
<LI>Powered from 12v Gel Cells
<LI>Computer controls 2 motors, one for drive, one for steering
<BR>
<B>Secondary Design Specifications</B><BR>
<LI>Recharge circuit for Gel Cells
<LI>Dual H-bridges and PWM speed control on motors
<LI>Two touch sensors on front
<LI>Axle speed counters on motors made from mouse guts
<LI>Light sensors on front
<LI>Simple onboard AI
<BR>
<B>'I wish' Design Specifications</B><BR>
<LI>Up the proccessing power to a Pentium
<LI>Speech Synthesis, output through speakers
<LI>Speech Recognition, input through microphone
<LI>Video Camera for sight
<LI>Able to manipulate objects via arm or similar
<LI>Able to return to a set location when batteries are low
<BR>
</font></p>
<HR>
<BIG><B>December 2002 - Found some motors, started thinking</BIG></B>
<table border=\"0\" width=\"100%\">
    <tr>
        <td><a href=\"botpics/Batt_motor1.JPG\"><font face=\"Arial\"><img
        src=\"botpics/Batt_motor1_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">Two motors and two 12v Gel Cells on a piece of wood I might use as the base board (December 2002)</font></td>
    </tr>
</table>
<HR>
<BIG><B>Early 2003 - Found a suitable computer to cannibalise</BIG></B>
<p align=\"left\">First thing was to choose a suitable computer to get
a motherboard from. I have several computers I could have used but
the one I chose was more suitable because:</p>
<ul type=\"disc\">
    <li><p align=\"left\">It was a 386- Not worth much if I break
        it, not too low powered and easy to program</p>
    </li>
    <li><p align=\"left\">It had onboard mouse(PS2), keyboard(PS2),
        VGA, parallel and 2 COM ports. This means it is
        essentially a single board computer except it had a
        daughter card with expansion slots and a card to replace
        the optional extended memory cache. Once I figure out
        which pins connect to which others, I should be able to
        puts loops of wire in and get rid of the need for any
        extra boards at all.</p>
    </li>
    <li><p align=\"left\">It had an onboard speaker and power LED.
        There were no other switches. It had a main power switch
        on the PSU and that was it.</p>
    </li>
</ul>

<p align=\"left\">I got the computer from a company that was
throwing them out. It refused to recognize the hard drive no
matter what I tried so I disconnected the hard drive and all its
cabling. The case was a massive metal thing, but the motherboard
was tiny for that age machine so I took the motherboard out and
put it in a cardboard box. The next thing was to figure out how
to power the motherboard without using its PSU. I used a digital
multimeter to measure the output voltages on the motherboard and
floppy dive power connectors. The results I got were as follows: </p>

<pre>
Motherboard connector
 ____________________________________________________________
|White|Orange|Blue|Black|Black|Black|Black|Yellow|Red|Red|Red|
|  +5 |  +12 | -12|  0  |  0  |  0  |  0  |  -5  | +5| +5| +5|
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Large power connectors
 ______________________________
| Yellow | Black | Black | Red |
|  +12v  |   0v  |  0v   | +5v |
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Small power connectors
 ______________________________
| Yellow | Black | Black | Red |
|  +12v  |   0v  |  0v   | +5v |
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
</pre>

<p>I was intending to make the robot primarily out of wood
because I am better at making things out or it than I am at
making things out of metal. I was thinking of a plywood base with
blocks underneath to hold axles etc. So far I have some wheels
and axles and 1 motor(12v wheelchair type). The motor has a
reduction box fitted to it that brings it down to about the right
speed (Have used it in a go-cart). </p>
<HR>
<big><b>September 2003 - Testing motherboard in new case</B></big><BR>
Motherboard is now nice and snug and secure in wooden box. I've tried it
and it boots from a floppy disk nicely. Wires are a bit of a mess though
<BR>
<Table>
    <tr>
        <td><a href=\"botpics/bot5.JPG\"><font face=\"Arial\"><img
        src=\"botpics/bot5_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">Housing for motherboard completed(September 2003)</font></td>
    </tr>
</table>
<p>
I'm trying to power the motherboard from batteries. I'm
going to need something to drop the voltage from 12v to 5v for
the motherboard logic. I'm a bit lacking in knowledge on that area
so I might just do some of the programming side instead.
</p>

<HR><big><b>Febuary 2004 - Started building again</B></big>
<BR>
Rebuilt the drive system and tried a few things in place. Took some
pics with my new digital camera:<BR>
<table>

    <tr>
        <td><a href=\"botpics/bot4.JPG\"><font face=\"Arial\"><img
        src=\"botpics/bot4_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">A view of the drive chain to the rear wheels (7th Feb 2004)</font></td>
    </tr>

    <tr>
        <td><a href=\"botpics/bot1.JPG\"><font face=\"Arial\"><img
        src=\"botpics/bot1_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">Plan view of the back of the robot showing offset motor (7th Feb 2004)</font></td>
    </tr>
    <tr>
        <td><a href=\"botpics/bot2.JPG\"><font face=\"Arial\"><img
        src=\"botpics/bot2_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">Cables connected to ports on motherboard (7th Feb 2004)</font></td>
    </tr>

    <tr>
        <td><a href=\"botpics/bot3.JPG\"><font face=\"Arial\"><img
        src=\"botpics/bot3_small.JPG\"></font></a><font face=\"Arial\"> </font></td>
        <td><font face=\"Arial\">A plan view of my robot(7th Febuary 2004)</font></td>
    </tr>
</table>
<BR>
Got a sort of interface working, computer can turn on and off 8 LED's
connected to parallel port. Can also sense 8 switches on the parallel
port.<BR><BR>

Attached some mouse guts to COM1 (serial port). Made a qbasic program
to control the parallel port and read speed of shafts in mouse guts
at the same time.<BR>
Software I've made works nicely, trouble is I need to control relays
for my motor driver board, and they draw more current than LED's and
also have back EMF that would damage the port. Could do with building
a better interface.
<HR>
<big><b>20th Feb 2004 - Started steering and motherboard power</B></big>
<BR>
<TABLE width=\"100%\">
<TR><TD>
<A HREF=\"botpics/Regulatorcircuit1.JPG\"><IMG SRC=\"botpics/Regulatorcircuit1_small.JPG\"></A>
<BR>
<A HREF=\"botpics/Regulatorcircuit2.JPG\"><IMG SRC=\"botpics/Regulatorcircuit2_small.JPG\"></A>
</TD><TD valign=\"middle\">
I've collected some 78xx series voltage regulators, they are from many different
common electrical appliances and power supplies. I collect old broken electronic
equipment so it was just a job of desoldering the components and making them work
in my circuit. The above pics show the circuit that provides regulated +12v and
+5v relative to GND. The outputs all come out to the strip of terminal block in
the foreground.
</TD></TR></TABLE>
I've also started building the steering mechanism for the front of the
robot. I've decided to have full 'ackerman' steering just like a cars
front wheels have.

<HR>
<big><b>21st Feb 2004 - Robot booted for the first time self powered 11:20pm</B></big>
<BR>
I have made the robot run off a single 12v gel cell. The regulators are
bolted to an angled piece of aluminium as a heat sink. During boot-up
with floppy drive and sound card attached the maximum current drain on
the battery was 2.2amps. From cold the heatsink reached about 50 
degrees C in the 45 seconds it took to boot. The hottest heatsink was
the +5v powering one third of the motherboard and the floppy drive.
The coolest regulator was the +12v used for both motherboard and floppy
drive.<BR>

The current circuit only provides channels of +12v and +5v. The 
motherboard does not seem to mind not having -12v or -5v. <BR>
With the computer idling(sitting at DOS prompt with no sound being
played and floppy inactive) the current drain was a rock steady
1.86amps. The regulators were still pretty hot but didn't seem to
be rising in temperature much anymore.
<TABLE width=\"100%\"><TR><TD>
<A HREF=\"botpics/Regulatorsnoheatsinks.JPG\"><IMG SRC=\"botpics/Regulatorsnoheatsinks_small.JPG\"></A>
</TD><TD>This is the circuit I built done freeform with bits of terminal block. Unfortunatly
when powered up like this the regulators shut down after about a minute from thermal overload
and I have to wait for it to cool down before trying again.
</TD></TR><TR><TD>
<A HREF=\"botpics/Workingcircuit1.JPG\"><IMG SRC=\"botpics/Workingcircuit1_small.JPG\"></A>
</TD><TD>Plan view showing the regulators bolted to a piece of aluminium
</TD></TR><TR><TD>
<A HREF=\"botpics/Workingcircuit2.JPG\"><IMG SRC=\"botpics/Workingcircuit2_small.JPG\"></A>
</TD><TD>Another view showing the motherboard working from the 7Ah gel cell
</TD></TR><TR><TD>
<A HREF=\"botpics/Steeringjointweld.JPG\"><IMG SRC=\"botpics/Steeringjointweld_small.JPG\"></A>
</TD><TD>A picture showing the steering arm and stub axle assembly. Here you can see the poor quality of my welding but hey, nobody's perfect.
</TD></TR><TR><TD>
<A HREF=\"botpics/Steeringplanview.JPG\"><IMG SRC=\"botpics/Steeringplanview_small.JPG\"></A>
</TD><TD>A plan view of the chassis showing the position the front steering will go.
</TD></TR></TABLE>
<HR>
I did some more tests and the unreliablity of the power supply has been
fixed by putting two gel cells in series to create a 24 volt supply. I
think the single battery didn't have enough voltage to allow the
regulators to function properly. I then tested all the bits of the
computer I could. The parallel port works fine without -ve voltages, so
does the sound card both MIDI and 16bit Wave work fine. The serial port
is currently unpredictable but I'm pretty certain that's a fault in my
program not the hardware.<BR><BR>
Drawn a schematic of the powersupply for my robot.<BR>
<IMG SRC=\"botpics/circuit2.gif\">
<HR>
<big><b>27th Feb 2004</B></big>
<BR>
I assembled and soldered together the 8 bit relay interface kit I
bought from <A HREF=\"http://www.QuasarElectronics.com\">Quasar Electronics</A> for
about 30 UK pounds.<BR>
<IMG SRC=\"botpics/q3074.jpg\"><BR>
It works great and I have used the first 4 relays in an H-bridge circuit
for the steering motor.<BR>
<BR>
Unfortunatly since the relays are only rated at 10amps and the pcb tracks to
them at 5 amps, I will have to get 4 more relays and wire them in so the
board switches these, which in turn send power to the main motor. I'm looking
for relays\car solenoids in the range of 20-25amps.<BR>
<BR>
The power supply works now so I am leaving that for now until I get some bigger
heat sinks. I have also got some car 'blade' type fuses that I intend to put
in the battery connection so that in the case of any short circuits, they blow
instead of something more expensive.
<HR>
<big><B>28th Feb 2004</b></BIG><BR>
I made a program in QBasic for testing the motor controller.<br/>
The program controls two motors attached to H-Bridge control circuits that are attached to lpt1.<br/>
Pin 1-4 is motor1, 5-8 is motor2 <br/>
Pin 1,2,5,6 are high side drivers<br/>
Pin 3,4,7,8 are low side drivers<br/>
<A NAME=\"bottom\"></A>

");
    /*Outputting the data to the end user*/
    $page->publish();