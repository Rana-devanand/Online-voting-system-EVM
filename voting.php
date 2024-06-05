<!DOCTYPE html>
<html lang="en">

<head>
    <!-- bootstrap min link file  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font icon link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Vote Your Leader |</title>
    <link rel="icon" href="assets/img/tittle.png" type="image/icon type">

</head>
 <style>
    .row
    {
        background-color: #1f1f1f;
        color: #fff;
    }
    h1 ,h3{
        font-family:'Times New Roman', Times, serif;
    }
    p{
    font-family:Arial, Helvetica, sans-serif;;

    }
 </style>
<body>
    <div class="container">
        <?php require "navbar/registeredVote.php" ?>
    </div>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9 mt-5">
                <h1> Rules of Procedures for Online Voting </h1>
                <hr style=" height:1px; background-color:#fff">
                <p>Certain decisions may be made through online voting, according to the KDE e.V.'s articles of
                    association. This involves voting on new members and establishing specific procedural guidelines.
                    Additionally, the KDE e.V. permits online voting on choices not covered by the articles of
                    association. There are various distinct sorts of votes, and the process and formula used to
                    determine the results vary somewhat. The way online votes are cast and the way the results are
                    determined are governed by these regulations. The purpose of these guidelines is to offer the KDE
                    e.V. a fair and practical means of making decisions through online voting.</p>
<br>
                <h3>1 Voting Administrators</h3>
                <p>The KDE e.V. board designates one or more voting administrators who are in charge of managing the
                    voting process on a technical level. This comprises distributing ballots, gathering votes,
                    tabulating, and disseminating the results.
                    Voter identities or any other information not included in the publicly available voting results may
                    not be disclosed by the voting administrators.
                </p>

<br>
                <h3>2 General procedure for online voting</h3>
                <p>An online voting is initiated by a voting proposal followed by a discussion period. After the
                    discussion period the voting period is started. The voting is finished by calculating and publishing
                    the voting results.</p>

                <p>Results of online votes are effective immediately following publication of the results unless
                    otherwise stated in the voting proposal.</p>

<br>

                <h3>2.1 Voting Proposal</h3>
                <p>An online voting is initiated by a proposal for voting which states the subject of the voting. The
                    proposal is sent by email to the membership mailing list and has to include exact and complete
                    information what is voted upon. Only the information which is directly included in the mail sent as
                    voting proposal is subject of the voting.</p>

                <p> The voting proposal email has to explicitly be marked as voting proposal by starting the email
                    subject line with one of the following strings, which are not case-sensitive:</p>
                <ol>
                    <li>Voting Proposal:</li>
                    <li> Vote Proposal:</li>
                    <li> Member Proposal</li>
                </ol>

                <p> Any active member can initiate a voting by sending a voting proposal.
                    The member who has initiated a vote can retract the voting proposal by sending an email to the
                    membership list stating the intention to retract the proposal.
                    A proposal can only be retracted within the discussion period.</p>

<br>
                <h3>2.2 Discussion Period</h3>
                <p>The discussion period begins on the date the membership mailing list receives the voting proposal.
                    Unless specified otherwise in the procedures for the specific type of vote (see: Types of Votes),
                    the discussion period lasts for two weeks. The discussion period should be used to discuss the
                    voting and form opinions about the options which are available for voting.</p>
<br>
                <h3>2.3 Start of Voting</h3>
                <p> When the discussion period has finished the voting is started by sending ballots to all active
                    members. The ballots should include the text of the proposal which is voted about.</p>
<br>
                <h3> 2.4 Voting Period</h3>
                <p> The voting period is started by sending out the ballots. Unless specified otherwise in the
                    procedures
                    for the specific type of vote (see: Types of Votes), the voting period lasts for two weeks. During
                    the
                    voting period the active members cast their votes. Only votes cast within the voting period are
                    considered for the results of the voting.</p>
<br>

                <h3> 2.5 End of Voting </h3>
                <p> After the voting period all cast votes are counted and the results of the voting are published.</p>

                <p> The results of a vote are published to the KDE e.V. membership by sending them to the membership
                    mailing
                    list. They have to include the number of persons permitted to vote, the total number of votes, and
                    the
                    number of votes for each available voting option. The results should also include a statement, if
                    the
                    voting was valid according to section 5.</p>
<br>
                <h3> 3 Types of Votes </h3>
                <p>There are three types of votes: Votes about new members (3.1), elections of groups of people (3.2),
                    votes for decision (3.3).</p>
<br>
                <h3> 3.1 Voting about new members </h3>
                <p>The discussion period is started by sending a new member proposal to the membership mailing list.
                    Within the discussion period at least two other members have to declare their support for the vote, otherwise
                    the proposal is considered to be rejected. If two members declare their support the voting is started
                    after the discussion period.</p>

                <p> The discussion period has a duration of one week and is extended to two weeks, if requested by a
                    member.The voting period has a duration of one week.</p>

                <p>For new member votes there are three options: "Yes", "No", "Abstention". The new member is accepted,
                    if
                    there are more "Yes" than "No" votes and the vote isn't invalid according to section 5.</p>
<br>
                <h3> 3.2 Electing groups of persons </h3>
                <p>For elections of groups of people there is an additional candidacy period before the voting proposal
                    is
                    sent. The person responsible for the execution of the voting sends a call for candidates to the
                    membership mailing list which starts the candidacy period. If there is no explicit rule about who is
                    responsible for execution of the voting, the board of the e.V. is responsible.</p>

                <p> The candidacy period lasts two weeks. All members who declare their candidacy in a statement sent to
                    the
                    membership list become candidates for the election.</p>

                <p> After the candidacy period the list of candidates is sent as voting proposal. This starts the
                    two-weeks
                    discussion period.</p>

                <p> The candidates are voted on as options according to section 3.4.</p>

<br>
                <h3> 3.3 Voting about decisions </h3>
                <p> The KDE e.V. can officially take decisions or decide about official statements on request of at
                    least
                    three active member. One member has to send the voting proposal to the membership mailing list. This
                    starts the discussion period. Within the discussion period at least two other members have to
                    declare
                    their support for the vote, otherwise the proposal is considered to be rejected. If two members
                    declare
                    their support the voting is started after the discussion period.</p>

                <p>The responsible party for execution of the voting sends the voting proposal which includes all
                    options.
                <p>This starts the discussion period.</p>

                <p> After the discussion period the voting is started. The options are voted on according to section
                    3.4.</p>

                    <hr style="background-color: #fff; height:2px">
                    <h2>Read all the terms and condition's </h2>
                    <button type="button" class="btn btn-success btn-lg"><a href="vote_from_here.php" style="color:#fff"> Go to Vote</a> </button>

                    <br><br><br>
            </div>
        </div>
    </div>
</body>

</html>