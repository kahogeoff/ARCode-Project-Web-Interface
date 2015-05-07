-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 07, 2015 at 03:14 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arcode_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_filepath`
--

CREATE TABLE `ar_filepath` (
`ID` int(11) NOT NULL,
  `Upload_Date` date NOT NULL,
  `Upload_User` text,
  `File_Name` text NOT NULL,
  `QR_Image` text NOT NULL,
  `Random_Code` text NOT NULL,
  `Note` text
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar_filepath`
--

INSERT INTO `ar_filepath` (`ID`, `Upload_Date`, `Upload_User`, `File_Name`, `QR_Image`, `Random_Code`, `Note`) VALUES
(19, '2015-05-07', '', '_2015-05-07_030149_data.pak', 'iVBORw0KGgoAAAANSUhEUgAAAcIAAAHCAQMAAABG1lsGAAAABlBMVEX///8AAABVwtN+AAAC7ElEQVR4nO2aTXLsMAiEqfIBdCRfXUfyAVRFxkADmozfW2YxzcKRLT5l08WfRoRGo9H+3IaGTTlUztdCzktE51iiaivbuFdhiyTJjYy/Lwfsmet9pO+cL1ffnRtBkmSSJqiX3Ex4JsElrkPzcuG5Iu9zSZJ8JFe+mvAO6BBGkuT/SI9fnvFaegxbJEk+kpBWl6Cpz3f8IPlH/iT55STUleTzI3VIkmQjy7BXq4BKeA9G8rvJ8rrfovlf0cfFQdHbNT+SJDc1lat7RQsX1bjVT9Hb6WpJkSTJVJ9LcPqeahsIuDbrn+S0iSTJIgWjJK+pbq+cZmNjRdOndSRJkkmO1V09gtnao1VOluC365YkSdfcHFDfrJmkF+IHSixFaDt7L0iSJOLWoX4PYtZu2kZIMMopOyMrKZIknUQNHoX4fYaG8KrEitHAhxqMJEl8Kc1VyIKtzX0skiQ3cruUPS/pvZ3kabf1Vo8kyY30du2KX6+VGH2lqpDlXpKTJLmrrw23r9ioyjvGS2PJB92SJFlTgZYAJwqrGi9FfBMhSbKTA8GrVjdZQ6UKY7BFkuRGRsHkjVver8U3ebtzW119JEm6pdzyHiSzYIwtgfuyV1IkSeKz2YXubeJIbNxvfsaBV5Ikk0QEi7QHUrMu1zQXaCqSJMlGjv5FqsvzqTf8WwIkSbKRCzjCUzjUrPsOWdbWnVo5kiTJlgXhFfOBaP69OBe/c0MqJEnyNzl2VY3VH/s3z4VTSJL8SDb15Y1IDJX2Zu6X+kiSzLQHfamnPYV/3sNJK7ZIktxJTCKnCMRYEsTwCbZIkuzkm5oQt8R/x4YsGP5o8EiSbOSApnwMAB1KVugOxWgAUY0kyUaGliJkSVVNPap19V0kSb6T9vmt8g7/S6C5plKSJJ9JEbR1Dvkj70bakIAkySdyYNAUowETnLkeihLrs/pIfjNphsatkt12aeKn2YokyTcysxv8I4L5t+UrSfW1LEiSJI1Go/29/QDg/D25qDmbCgAAAABJRU5ErkJggg==', 'U3Fpd25mbUxJaGpSMWF2cw==', 'A small test'),
(20, '2015-05-07', '', '_2015-05-07_030747_data.pak', 'iVBORw0KGgoAAAANSUhEUgAAAcIAAAHCAQMAAABG1lsGAAAABlBMVEX///8AAABVwtN+AAAC60lEQVR4nO2ay63jMAxFCaQAl+TWXVIKMMBx+JeTeTO7t8jhwklkHq4uqCsqIgRBEL8em0Yc2ymy6yl6XMuqz4faQ/an5V0vIk5IyIWMzyv/lXW9uFIr/1q7Ska+lWwCErLIXL7ybXk34Vm88D2/eY0DEvJvpH17SjxajNbkDoGE/B+yd0HrYOo7HiTkv0iLXLZ2FTXEd0Er9NP+CfnlpEZYB/v5EQEJuZAdW8jNH7uqW3JT5D0XEvKWn9Lyw1zVMKXFi5TerfdBQsqmI9VrHCLZt17Le5U0/Cj1QUJ6PLw9Zeqj+taZB7zM92FlqQ8SMtRXzrt0uFfLOqp4mfPSHiRkRs6wjyxkEhw69BGlT73t5gQSciFLfdW3RpZVq5u2GA28dTDILyfbdNeNyCvfFRlr0d90jpwgIT/Mhyw1LtmiZN2XiOtw8WCQkB55Umtp7bnP+Vq7q5IqJOQkU1UBtfNuXOdVCSTkjey+VdYpYtpvH3PvvSlCQi5ke/BuaHGsi5RxtquAhKwY+rKfw4i/n/J6j4SE9NhCaSI1SjrWm5M9d0FtYwUJuZzLbKW71bwvGdap60JCLmT2rXRIcxeMbrVpeqo69EFCjlNb3ZJs2Z7KdKfwpHzWEpCQFtu53OQnmeqzF1pTAdWhW0jIVUi2902vFJOCxKt5bZCQdzduWfHwGqoxSvJtT8tsPaZuISFLeDYV0Mo6RKQnlm6i6pTXA0xIyFJfmqh5R9ujpCg5vkFCLqTIsE5hmJ4hy853RR69FUJCTnKMI72DvRQZcS46rJKQkKunDpGphgSNHDcneaybXh0ScjnRSagqe1S6Ju0Otp0zBRKyyepWE9I60ZkOG+8rOEjIIuNzuY+NfB9zR414sUwFICElGlUnuGuS+N9j4KXD9SwICXkjS4L+KAnWfjhGA5CQH8keKqURj3PcQ8fF24cOBvn1pMWYLNnPFt5RZss7GCTkjcxFd+PPtzbW/qlTICEHSRAE8avxB+Jpv80tr8iqAAAAAElFTkSuQmCC', 'V3RFSyQqKThjdzdEemo/YQ==', '&lt;a href=&quot;LOL1994&quot;&gt;&lt;/a&gt;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ar_filepath`
--
ALTER TABLE `ar_filepath`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ar_filepath`
--
ALTER TABLE `ar_filepath`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
