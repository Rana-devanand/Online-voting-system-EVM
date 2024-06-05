CREATE DATABASE IF NOT EXISTS `voters_list` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `voters_list`;

-- Candidate table:
CREATE TABLE IF NOT EXISTS `candidate` (
    `s.no` INT NOT NULL AUTO_INCREMENT,
    `Cname` VARCHAR(50) NOT NULL,
    `dob` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `otp` VARCHAR(50) NOT NULL,
    `Aadhar` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(50) NOT NULL,
    `cPassword` VARCHAR(50) NOT NULL,
    `Pname` VARCHAR(50) NOT NULL,
    `Cphoto` VARCHAR(50) NOT NULL,
    `symbol` VARCHAR(50) NOT NULL,
    `confirm` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- Registered_vote table:
CREATE TABLE IF NOT EXISTS `registered_vote` (
    `s.no` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(50) NOT NULL,
    `number` INT NOT NULL,
    `otp` INT NOT NULL,
    `confirm` INT NOT NULL,
    PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- Voters_list table:
CREATE TABLE IF NOT EXISTS `voters_list` (
    `s.no` INT NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `FatherName` VARCHAR(50) NOT NULL,
    `MotherName` VARCHAR(50) NOT NULL,
    `dob` VARCHAR(50) NOT NULL,
    `number` VARCHAR(50) NOT NULL,
    `gender` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `cpassword` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `cemail` VARCHAR(50) NOT NULL,
    `street` VARCHAR(50) NOT NULL,
    `street1` VARCHAR(50) NOT NULL,
    `city` VARCHAR(50) NOT NULL,
    `state` VARCHAR(50) NOT NULL,
    `Assembly` VARCHAR(50) NOT NULL,
    `zip` INT NOT NULL,
    `photo` VARCHAR(50) NOT NULL,
    `sign` VARCHAR(50) NOT NULL,
    `epic_no` VARCHAR(50) NOT NULL,
    `vote` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- Vote_counting table:
CREATE TABLE IF NOT EXISTS `vote_counting` (
    `s.no` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `aadhar_no` VARCHAR(50) NOT NULL,
    `vote_to` INT NOT NULL,
    `vote_confirm` INT NOT NULL,
    PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
