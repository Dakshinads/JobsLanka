-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 04:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobslanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(11) NOT NULL,
  `job_seeker_id` varchar(12) NOT NULL,
  `job_ref_no` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_job`
--

INSERT INTO `applied_job` (`id`, `job_seeker_id`, `job_ref_no`, `status`) VALUES
(3, '982890659V', 11, 1),
(4, '982890659V', 5, 0),
(5, '199810015454', 11, 2),
(6, '199810015454', 8, 0),
(7, '199810015454', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `email`, `name`, `phone_no`, `password`, `website`, `logo`) VALUES
(1, 'info@lolcfinance.com', 'LOLC Holdings PLC', '0115715555', '25d55ad283aa400af464c76d713c07ad', 'https://www.lolc.com', '6362752d78a5d4.06354748.png'),
(2, 'info@cdbfinance.com', 'CDB Bank', '0117388388', '25d55ad283aa400af464c76d713c07ad', 'https://www.cdb.com', '636a85064a71f1.61874230.jpg'),
(3, 'info@softlogicfinance.com', 'Softlogic Finance', '0115555799', '25d55ad283aa400af464c76d713c07ad', 'https://www.softlogic.com', '636a8596e45935.08577701.jpg'),
(4, 'info@dominosfinance.com', 'dominosfinance', '117777888', '25d55ad283aa400af464c76d713c07ad', 'www.dominos.com', NULL),
(5, 'info@hsbcfinance.com', 'hsbcfinance', '114472200', '25d55ad283aa400af464c76d713c07ad', 'www.hsbc.com', NULL),
(6, 'info@asc.lk', 'ASC pvt Ltd', '715664489', '25d55ad283aa400af464c76d713c07ad', 'https://asc.lk', '636272985bc677.96059358.png'),
(7, 'info@hcl.lk', 'HCL Technologies Lanka (Private) Limited', '0719884584', '25d55ad283aa400af464c76d713c07ad', 'https://hcl.lk', '6363cacdabd542.38668404.jpg'),
(8, 'md@virtusa.com', 'Virtusa (Pvt.) Ltd', '0719045445', '25d55ad283aa400af464c76d713c07ad', 'https://virtusa.lk', '6366a2abcc79f5.18683341.jpg'),
(9, 'dilshand@gmail.com', 'DILSHAN DRAPERS', '0112358964', '25d55ad283aa400af464c76d713c07ad', 'https://www.dilshandrapers.com', '636a425f4ff927.50386034.jpg'),
(10, 'smouse@gmail.com', 'soundmouse', '0124578963', '25d55ad283aa400af464c76d713c07ad', 'https://www.adelanka.com', '636a43dd965382.76100067.jpg'),
(11, 'acclro@gmail.com', 'ACCELAERO', '0114256578', '25d55ad283aa400af464c76d713c07ad', 'https://accelaero.com', '636a4c25bc4313.44320454.png'),
(12, 'acen@gmail.com', 'acentura', '0112789456', '25d55ad283aa400af464c76d713c07ad', 'https://www.acentura.com', '636a4cb4313749.99638024.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `job_seeker_id` varchar(12) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `description`, `job_seeker_id`, `employer_id`) VALUES
(1, 'Great platform for employers to publish jobs', NULL, 1),
(2, 'Superb for employers and job seekers', NULL, 2),
(3, 'I found a job using this website. This is a great', '982890659V', NULL),
(6, 'Best website for publishing vacancies.', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) DEFAULT NULL,
  `message` text NOT NULL,
  `staff_id` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `phone_no`, `message`, `staff_id`) VALUES
(1, 'Yasiru', 'samarasekarayasiru@gmail.com', '764529870', 'website phone number not working', '982890659v'),
(2, 'Vihanga', 'vihanga1998@gmail.com', '753284619', 'Cannot change my phone number', '986384923V'),
(3, 'Sahan', '2000sahan@mail.com', '784587962', 'Cannot change my email address?', '199855648787'),
(4, 'Pubudu', 'gayashanpubudu@gmail.com', '784587962', 'Cannot pay for an add online', '199845755555'),
(5, 'Dakshina shashimal', 'shashimaldakshina1@gmail.com', '0754844444', 'How to login?', '200045177878'),
(6, 'Chandrasekara', 'chandrasekara@gmail.com', '0751245787', 'Can I sign in without a CV?', NULL),
(9, 'Kumara', 'kumara@gmail.com', '0745789999', 'How to can I change my email?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview_timeslot`
--

CREATE TABLE `interview_timeslot` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview_timeslot`
--

INSERT INTO `interview_timeslot` (`id`, `time`, `employer_id`, `isactive`) VALUES
(1, '08:00-08:30', 1, 1),
(2, '08:30-09:00', 1, 1),
(3, '09:00-09:30', 1, 1),
(4, '09:30-10:00', 1, 1),
(5, '10:00-10:30', 1, 1),
(6, '09:00-09:30', 6, 1),
(7, '09:30-10:00', 6, 1),
(8, '11:00-11:30', 1, 1),
(9, '08:00-08:30', 8, 1),
(10, '08:30-09:00', 8, 1),
(11, '09:00-09:30', 8, 1),
(12, '09:30-10:00', 8, 1),
(13, '10:30-11:00', 8, 1),
(14, '08:00-08:30', 3, 1),
(15, '08:30-09:00', 3, 1),
(16, '09:00-09:30', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_ref_no` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `opening_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `reason` text DEFAULT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_ref_no`, `title`, `description`, `image`, `opening_date`, `closing_date`, `active`, `status`, `reason`, `job_category_id`, `job_type_id`, `employer_id`, `location`) VALUES
(1, 'System Analyst (Bestie Head Office - Homagama)', '<div><strong>System Analyst (Bestie Head Office - Homagama)</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Bestie Beverages a subsidiary of the LOLC Group, is primarily concerned with a&nbsp; whole new dimension to the world&rsquo;s most sought after beverage as our sole&nbsp; ingredient &ndash;tea. We source high quality single &ndash;origin, single estate tea only&nbsp; from our own estates in Ragala and NuwaraEliya, which is a part of Mathurata plantations. As a result of our expansion plans, the following opportunity&nbsp; exists with us.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div><strong>The Job&nbsp;</strong></div>\r\n<div>\r\n<ul>\r\n<li>Business evaluation and implementation&nbsp; of SFA (Sales Force Automation).&nbsp;</li>\r\n<li>New SFA module testing and updating&nbsp; SFA to latest technologies.&nbsp;</li>\r\n<li>Performing Administrator part in SFA.</li>\r\n<li>Training Sales Personnel in SFA.&nbsp;</li>\r\n<li>Troubleshoot Tab, Printers of Sales&nbsp; Representatives &amp; Distributors.&nbsp;</li>\r\n<li>Troubleshoot PC &amp; Laptop (Office &amp;&nbsp; Field).&nbsp;</li>\r\n<li>Data Upload to SFA.</li>\r\n</ul>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div><strong>The Person&nbsp;</strong></div>\r\n<div>\r\n<ul>\r\n<li>Diploma/Degree in Software Engineering / Business Information Systems or relevant field&nbsp;</li>\r\n<li>Minimum 1+ years in a similar capacity in&nbsp; implement environment&nbsp;</li>\r\n<li>Excellent planning, analytical communication and problem-solving skills in a team-focused&nbsp; dynamic environment&nbsp;&nbsp;</li>\r\n<li>Ability to learn quickly in a dynamic changing&nbsp; technological environment with a passion for technology&nbsp;</li>\r\n<li>Excellent written communication, interpersonal and relationship building skills.</li>\r\n</ul>\r\n</div>', '', '2022-11-03', '2022-11-04', 0, 3, NULL, 1, 11, 1, 'Colombo'),
(2, 'Deputy Manager - Business Development (Factoring) Wattala / Gampaha', '<div><span style= font-size: medium; ><strong>Job Profile:</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >To generate new Factoring business as per assigned target in order to achieve budgeted business volumes and profitability.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >To maintain profitability and health of the portfolio.</span></li>\r\n<li><span style= font-size: medium; >To develop Factoring in the assigned region and train regional staff to promote factoring.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >To do the credit evaluation on new Factoring clients, submit facility proposals for approval and activate approved facility in the system.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >To assist with the business promotions, advertising, corporate communications and other business development activities of the Factoring BU in the assigned region.</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>Personal and skills Profile:</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Fully or partly qualified in CIM/SLIM/Degree or equivalent&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Minimum 3 years  experience in marketing financial products &amp; credit evaluation&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Good in communication, negotiation &amp; analytical skills&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Passion for marketing working capital related lending</span></li>\r\n</ul>\r\n</div>', '636274db226bf0.41875339.jpg', '2022-11-02', '2022-11-29', 1, 1, NULL, 4, 10, 1, 'Gampaha'),
(3, 'Graphic Designer', '<div><span style= font-size: medium; >LOLC Group, one of Sri Lanka s leading diversified conglomerates, through focused strategy and investments continues to expand its horizons from being long known as one of the most dynamic and profitable financial institutions in Sri Lanka to holding a diversified portfolio spanning from Leisure, Plantations, Agri Inputs, Renewable Energy, Construction, Manufacturing and Trading and to strategic investments. As a result of our business expansion plan, the following opportunity exists with us</span></div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><strong><span style= font-size: x-large; >Graphic Designer</span></strong></div>\r\n<div><span style= font-size: medium; ><strong>&nbsp;</strong></span></div>\r\n<div><span style= font-size: medium; ><strong>The Key Responsibilities</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Design graphics for use in multiple products and manage the creative production of print and digital collateral including, event materials, advertisements, branded products, posters, web content, presentations, and so on.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Report to Creative Design Specialist and liaise with Assistant Manager - PR &amp; Digital Marketing and the Strategic</span></li>\r\n<li><span style= font-size: medium; >Business Units (SBUs) of the Company to determine their requirements and proactively manage projects in a timely manner&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Obtain product briefs and work towards developing the required material on agreed timescales to fulfil divisional requirements&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Coordinate with multiple teams, departments, external agencies and vendors, as and when required, to meet deadlines and successfully accomplish project goals&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Maintain consistency across all deliverables and independently manage multiple projects, whilst keeping to deadlines</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>The Person</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Degree or Diploma in Graphic Designing from a recognized&nbsp;institute&nbsp;</span></li>\r\n<li><span style= font-size: medium; >2-3 years of experience in a similar job role&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Fluency in Sinhala &amp; English&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Ability to handle photography, videography and editing projects, as and when required&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Ability to work with minimum supervision with high-quality output&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Should be an enthusiastic, creative and forward-thinking individual</span></li>\r\n</ul>\r\n</div>', '63627764ed7e11.50555459.jpg', '2022-11-02', '2022-11-16', 1, 1, NULL, 2, 10, 1, 'Gampaha'),
(4, 'Executive - Facility Management', '<div><strong><span style= font-size: x-large; >Executive - Facility Management</span></strong></div>\r\n<div><span style= font-size: medium; >We are looking for a dynamic, dedicated, and team oriented individual who can make a valuable contribution to the continued success of the organization.</span></div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>Job Profile</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Preparation of reports and memos related to facilities management activities&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Maintain an Asset Registry by tracking newly purchased or disposal of assets related to facilities management&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Handle all documentation related to service agreements, payments, work orders etc.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Track and renew service agreements with the suppliers&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Conduct scheduled maintenance procedures for equipment including air-conditioners, generators, water pumps, fire extinguishers etc.,&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Support for space planning in new interior modifications&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Assist Divisional Head to obtain quotations from suppliers for given tasks&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Ensure completeness of tasks done by contractors&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Ensure cleanliness of the Head Office premises&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Implement energy saving initiatives</span></li>\r\n</ul>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n</div>\r\n<div><span style= font-size: medium; ><strong>Qualifications and Experience</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Degree or Diploma in a technical background&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Minimum 2 years  work experience&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Excellent written and communication skills in English is mandatory&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Proficiency in Microsoft Office and computer literacy are compulsory&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Experience related to building services and maintenance would be advantageous</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; >Rewards and remuneration commensurate with qualifications, competencies and abilities, with a well-defined career path awaits those with ambition, motivation and a willingness to perform.</span></div>', '', '2022-11-02', '2022-11-17', 0, 1, NULL, 4, 10, 2, 'Colombo'),
(5, 'Junior Operations Assistant - Head Office', '<div><strong>Your journey of aspirations begins here!</strong></div>\r\n<div>&nbsp;</div>\r\n<div>CDB believes in elevating the lives of all Sri Lankans. Our focus is to employ and engage individuals who aspire to grow their careers within a renowned financial entity, working with a dynamic team of industry professionals who are dedicated to raising the bar and setting benchmarks in Sri Lanka s financial industry.</div>\r\n<div>&nbsp;</div>\r\n<div>The ideal candidates should be exceptional individuals with a high degree of motivation, excellent communication skills, ability to work as part of a team and possess the determination to succeed in a challenging environment.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Qualifications</strong></div>\r\n<div>\r\n<ul>\r\n<li>Be between 19-22 years&nbsp;</li>\r\n<li>Have 3 passes at the G.C.E. A/L examination and a minimum of B passes for English and Mathematics at the G.C.E. O/L examination.&nbsp;</li>\r\n<li>Process excellent communication skills.&nbsp;</li>\r\n<li>Sports/Extracurricular activities would be given due recognition&nbsp;</li>\r\n<li>School leavers with positive attitude are encourage to apply</li>\r\n</ul>\r\n</div>', '', '2022-11-08', '2022-11-22', 1, 1, NULL, 5, 11, 2, 'Gampaha'),
(6, 'Franchise Showroom Managers', '<div><strong>Franchise Showroom Managers</strong></div>\r\n<div>&nbsp;</div>\r\n<div><strong>අවශ්&zwj;යතා</strong></div>\r\n<div>\r\n<ul>\r\n<li>අවුරුදු 25-45 අතර&nbsp;</li>\r\n<li>විදුලි උපකරණ වෙළදාමේ හා අලෙවියේ වසර 2ක පළපුරුද්ද&nbsp;</li>\r\n<li>රු. 350,000ක මූලික ආයෝජනයකින් ගිවිසුම් ගත විය හැකිය&nbsp;</li>\r\n<li>විකිණුම් පළපුරුද්ද විශේෂ සුදුසුකමක් වේ</li>\r\n</ul>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div><strong>පහත සඳහන් අපගේ ශාඛාවන් සඳහා</strong></div>\r\n<div>\r\n<ul>\r\n<li>බලංගොඩ&nbsp;</li>\r\n<li>කැබිතිගොල්ලෑව&nbsp;</li>\r\n<li>බණ්ඩාරවෙල&nbsp;</li>\r\n<li>පරාක්&zwj;රමපුර&nbsp;</li>\r\n<li>හලාවත</li>\r\n<li>සියඹලාණ්ඩුව&nbsp;</li>\r\n<li>ගලෙන්බිඳුනුවැව&nbsp;</li>\r\n<li>වැලිමඩ&nbsp;</li>\r\n<li>කඹුරුපිටිය&nbsp;</li>\r\n<li>යටියන්තොට&nbsp;</li>\r\n<li>නුවර</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div><strong>Requirements</strong></div>\r\n<div>\r\n<div>\r\n<ul>\r\n<li>Between 25-45 years</li>\r\n<li>2 years of experience in trading and sales of electrical appliances</li>\r\n<li>Rs. 350,000 initial investment can be contracted</li>\r\n<li>Freelance sales experience is a particular qualification</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div><strong>&nbsp;</strong></div>\r\n<div><strong>For our branches mentioned below</strong></div>\r\n<div>\r\n<div>\r\n<ul>\r\n<li>Balangoda</li>\r\n<li>Bandarawala</li>\r\n<li>Chilaw</li>\r\n<li>Galenbinthunuvewa</li>\r\n<li>Kumburupitiya</li>\r\n<li>Nuwara</li>\r\n<li>Kebathigollewa</li>\r\n<li>Parakramapura</li>\r\n<li>Siyambalanduwa</li>\r\n<li>Velimada</li>\r\n<li>Yatiyanthota</li>\r\n</ul>\r\n</div>\r\n</div>', '', '2022-11-03', '2022-11-30', 0, 2, 'invalid job information', 4, 10, 3, 'All Locations'),
(7, 'Executive Showroom Manager | Softlogic MAX', '<div><strong><span style= font-size: x-large; >Join the fastest growing retail consumer electronics chain in the country</span></strong></div>\r\n<div>&nbsp;</div>\r\n<div><span style= font-size: medium; >Softlogic Retail (Pvt) Ltd is a fully owned subsidiary of Softlogic Holdings PLC, and a prestigious partner for many of the world s leading consumer electronics brands. Softlogic Retail has an enviable range of international brands in its portfolio, such as Panasonic, Samsung, Candy, Nokia, Apple, Dell, Acer, Xerox and NEC in addition to its own private brands, namely Softlogic PRIZM, Maxmo and more recently Softlogic Furniture. We are looking for a dynamic and vibrant person for the above position. Successful candidates will be offered an attractive remuneration package with other benefits, keeping in line with the industry standards.</span></div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Male and Female Candidates.</span></li>\r\n<li><span style= font-size: medium; >Minimum 3-4 Years  experience in Consumer Durable Mobile handset Furniture Retail Operations in Manager or Assistant Manager Capacity.</span></li>\r\n<li><span style= font-size: medium; >Age between 30 - 40 years.</span></li>\r\n<li><span style= font-size: medium; >Excellent customer service &amp; team management skills with fluency in English.</span></li>\r\n<li><span style= font-size: medium; >Knowledge in Furniture Retailing &amp; Hire Purchase Management would be an added advantage</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>The selected candidates will be eligible for the following rewards.</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >6 Figure salary including commissions.</span></li>\r\n<li><span style= font-size: medium; >Bonuses and foreign incentive tours.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Medical insurance for family. Group employee discounts.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Continuous training and career Development across the group.</span></li>\r\n</ul>\r\n</div>', '', '2022-11-03', '2022-11-29', 1, 1, NULL, 3, 10, 3, 'Colombo'),
(8, 'Network Infrastructure Technical Specialist', '<div class= job-overview  job-overview-div >Do you have 9+ years of experience in related field? Please refer to the job advert for further information.</div>\r\n<div class= dd-handle-custom >&nbsp;</div>\r\n<div class= job-b0a62118-8153-437e-906d-3221607bfa82 >\r\n<div><span style= font-size: medium; ><strong>Job Description/Key skills Required</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Cisco Routing &amp; Switching Engineers - L3 support&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Troubleshooting &amp; Implementation experience in core routing protocols&nbsp;</span></li>\r\n<li><span style= font-size: medium; >BGP,OSPF, EIGRP, MP-BGP, MPLS IS-IS, SONET/SDH Technologies&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Hands on experience in Nexus 5k, 2k,7k etc.</span></li>\r\n<li><span style= font-size: medium; >Sound knowledge and understanding on QOS technologies MQC, LLQ, CBWFQ, WRED and MPLS-TE.</span></li>\r\n<li><span style= font-size: medium; >Understanding of various hardware queuing technologies and shaping technologies&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Sound knowledge and Hands on experience in switching technologies, STP.VPC, VSS, VDC,OTV, TRILL, Fabric path etc.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Troubleshooting &amp; Implementation experience in WAN protocols &amp; service providers&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Excellent communication skills&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Troubleshooting &amp; Implementation experience in WAN protocols&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Working experience across various cisco Routers and switches&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Hands on Experience in Load balancers and WAN optimizers&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Upgrades network by conferring with vendors, developing, testing, evaluating, and installing enhancements.&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Secures network by developing network access, monitoring, control, and evaluation;</span></li>\r\n<li><span style= font-size: medium; >Maintaining documentation&nbsp;</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>Soft Skills:</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Excellent Communication skills ( written &amp; verbal)&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Good Documentation Skills&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Good Presentation Skills&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Team Work</span></li>\r\n<li><span style= font-size: medium; >Ability to derive a project plan&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Strong leadership skills and Excellent organizational&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Build and maintain relationships with stakeholders</span></li>\r\n</ul>\r\n</div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>Qualifications/Relevant experience:&nbsp;</strong></span></div>\r\n<div>\r\n<ul>\r\n<li><span style= font-size: medium; >Bachelor of Engineering/Bachelor of Technology/MCA (Master of Computer Applications)/Bachelor of Science/Bachelor of Communications</span></li>\r\n<li><span style= font-size: medium; >9+ years of experience (Data Center)&nbsp;</span></li>\r\n</ul>\r\n<strong>Certification Required:</strong><br>\r\n<ul>\r\n<li><span style= font-size: medium; >OCCNP/CCIE or equivalent Certification&nbsp;</span></li>\r\n<li><span style= font-size: medium; >ITSM/ITIL Process Foundation Certified Extensive&nbsp;</span></li>\r\n<li><span style= font-size: medium; >Professional experience on Data Centre Management</span></li>\r\n</ul>\r\n</div>\r\n</div>', '', '2022-11-03', '2022-11-15', 1, 1, NULL, 2, 10, 7, 'Colombo'),
(9, 'Automation Test Architect - Selenium Java', '<div><strong><span style= font-size: x-large; >HCL Sri Lanka is Hiring!</span></strong></div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; ><strong>Automation Test Architect - Selenium Java</strong></span></div>\r\n<div><span style= font-size: medium; >&nbsp;</span></div>\r\n<div><span style= font-size: medium; >Experience: Over 10 Years&nbsp;</span></div>\r\n<div><span style= font-size: medium; >Skills: Automation, Java, BDD, Agile, Selenium&nbsp;</span></div>\r\n<div><span style= font-size: medium; >No. of positions: 10</span></div>', '6363cb752c2388.44608891.jpg', '2022-11-03', '2022-11-16', 0, 2, 'insufficient  job description', 1, 10, 7, 'Colombo'),
(10, 'Senior UI Developer', '', '6366a3113aca54.58838625.png', '2022-11-05', '2022-11-20', 1, 1, NULL, 1, 10, 8, 'Colombo'),
(11, 'Information Technology Audit Consultant', '', '6366a354c5f6c6.66381556.png', '2022-11-08', '2022-11-21', 1, 1, NULL, 2, 10, 8, 'Colombo'),
(12, 'Senior Software Engineer', '', '6366a388b441d6.80016503.png', '2022-11-05', '2022-11-22', 0, 2, 'Information is not enough', 1, 10, 8, 'Colombo'),
(13, 'Account Officer - Excel Restaurants', '', '636a5495b99ce2.38237814.png', '2022-11-08', '2022-11-19', 1, 1, NULL, 4, 10, 1, 'All Locations'),
(14, 'maintenance Vacancies - Excel World Resturant', '', '636a553bb66da8.00690162.png', '2022-11-08', '2022-11-19', 0, 0, NULL, 8, 10, 1, 'All Locations'),
(15, 'Business Analyst', '', '636a55cab572b5.88407973.png', '2022-11-08', '2022-11-19', 1, 1, NULL, 1, 10, 1, 'All Locations'),
(16, 'Chef De Party', '', '636a562b8e4235.51585096.png', '2022-11-08', '2022-11-19', 0, 0, NULL, 6, 10, 1, 'All Locations'),
(17, 'Site Supervisor / Assistant Engineer?', '', '636a56dbb61c76.93471976.png', '2022-11-08', '2022-11-15', 0, 0, NULL, 8, 10, 1, 'Gampaha'),
(18, 'Executive/ Assistant Manager- Risk Management ', '', '636a5aa14579c1.86487276.png', '2022-11-08', '2022-12-08', 0, 2, 'Details unclear', 4, 11, 2, 'All Locations'),
(19, 'Management Trainee - Risk Management ', '', '636a5b16ec2fb1.79542409.png', '2022-11-08', '2022-12-08', 1, 1, NULL, 4, 12, 2, 'All Locations'),
(20, 'Call Center Representative - Resturent', '', '636a5dd7ba73f5.06905666.png', '2022-11-08', '2022-12-08', 1, 1, NULL, 9, 11, 3, 'Gampaha'),
(21, 'Call Center Associate - Hospitals ', '', '636a627a13c015.72641989.jpg', '2022-11-08', '2022-12-07', 0, 0, NULL, 11, 10, 3, 'All Locations'),
(22, 'Call Center Executive ', '', '636a632bd64a29.47474524.jpg', '2022-11-08', '2022-12-07', 0, 0, NULL, 7, 12, 3, 'All Locations'),
(23, 'Software Engineer', '', '636a64674d4150.86262426.jpg', '2022-11-08', '2022-11-30', 1, 1, NULL, 1, 10, 3, 'All Locations'),
(24, 'Assistant Manager - Information Security & Risk ', '', '636a64ad182dc1.35544885.jpg', '2022-11-08', '2022-12-01', 1, 1, NULL, 1, 10, 3, 'All Locations'),
(25, 'Consultant Cum Business Developer', '', '636a651d8ef363.04149833.jpg', '2022-11-08', '2022-12-06', 1, 1, NULL, 4, 13, 3, 'Kegalle'),
(26, 'Internship - Finance ', '', '636a65c0475564.84505786.jpg', '2022-11-08', '2022-12-06', 1, 1, NULL, 5, 10, 3, 'Matara'),
(27, 'Insurance Service Assistant - Sales Support Unit', '', '636a660eb36315.77341634.jpg', '2022-11-08', '2022-12-08', 1, 1, NULL, 3, 11, 3, 'Colombo'),
(28, 'Internal Audit Executive', '', '636a668d04f179.73099431.jpg', '2022-11-08', '2022-12-04', 1, 1, NULL, 5, 12, 3, 'Galle'),
(29, 'Senior Brand Executive / Brand Executive ', '', '636a66ce67b405.88204024.jpg', '2022-11-08', '2022-12-06', 1, 1, NULL, 3, 11, 3, 'Hambantota'),
(30, 'Customer Service Representative', '', '636a84880c1163.81848375.png', '2022-11-08', '2022-12-07', 0, 0, NULL, 7, 10, 7, 'Colombo'),
(31, 'HR & Admin Executive', '', '636a8807b5cb61.20598821.png', '2022-11-08', '2022-12-05', 0, 0, NULL, 12, 10, 9, 'All Locations'),
(32, 'Business Development Executive - Export Sales', '', '636a88b0b7fc14.57419571.png', '2022-11-08', '2022-11-29', 0, 0, NULL, 3, 10, 9, 'All Locations'),
(33, 'Showroom Sales Assistants (Kelaniya / Negombo)', '', '636a89800d56d3.88578798.png', '2022-11-08', '2022-12-06', 0, 0, NULL, 3, 10, 9, 'Gampaha'),
(34, 'Business Development Executive - Sales', '', '636a89e51b6704.31300555.png', '2022-11-08', '2022-11-27', 0, 0, NULL, 3, 10, 9, 'All Locations'),
(35, 'Digital Marketing Executive', '', '636a8b613ca397.20208517.png', '2022-11-08', '2022-12-08', 0, 0, NULL, 3, 10, 9, 'All Locations'),
(36, 'Assistant Store Keeper (Kelaniya)', '', '636a8daed8bca0.79536614.png', '2022-11-08', '2022-12-05', 0, 0, NULL, 3, 10, 9, 'Gampaha'),
(37, 'Project Coordinator', '', '636a8e6007f216.34477123.jpg', '2022-11-08', '2022-12-08', 1, 1, NULL, 1, 10, 10, 'All Locations'),
(38, 'Network Engineer', '', '636a8ebdce9fb5.54379091.jpg', '2022-11-08', '2022-11-30', 0, 0, NULL, 2, 12, 10, 'All Locations'),
(39, 'Junior QA Engineer', '', '636a90c7799ec0.09568694.png', '2022-11-08', '2022-11-25', 1, 1, NULL, 1, 10, 10, 'All Locations'),
(40, 'Software Engineer', '', '636a91200dd323.96454787.jpg', '2022-11-08', '2022-11-30', 0, 0, NULL, 1, 12, 10, 'All Locations'),
(41, 'Software Engineer', '', '636a91831d2de3.00414949.png', '2022-11-08', '2022-12-01', 1, 1, NULL, 1, 10, 10, 'All Locations'),
(42, 'Senior Manager - Quality Assurance', '', '636a93d3d68d15.09612151.png', '2022-11-08', '2022-12-06', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(43, 'Trainee .Net Engineer', '', '636a94404959f2.86390447.png', '2022-11-08', '2022-11-23', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(44, '.Net Technical Lead', '', '636a94af3226d7.59961915.png', '2022-11-08', '2022-11-25', 1, 1, NULL, 1, 10, 12, 'All Locations'),
(45, '.Net Senior Engineer', '', '636a959ccf2001.49820068.png', '2022-11-08', '2022-12-03', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(46, 'QA Lead Automation - Cypress / Selenium', '', '636a989050ab86.95007584.png', '2022-11-08', '2022-11-29', 1, 1, NULL, 1, 10, 12, 'All Locations'),
(47, 'MS Dynamics - Solution Architect', '', '636a993bf0bab6.49842454.png', '2022-11-08', '2022-11-28', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(48, 'QA Engineer - Manual Testing', '', '636a9989722c74.70022417.png', '2022-11-08', '2022-12-07', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(49, 'QA Lead - Automation Testing', '', '636a99ddcadaf2.53719061.png', '2022-11-08', '2022-11-29', 1, 1, NULL, 1, 12, 12, 'All Locations'),
(50, 'Senior QA Engineer - Automation Testing', '', '636a9a294a0226.32931310.png', '2022-11-08', '2022-11-27', 1, 1, NULL, 1, 10, 12, 'All Locations'),
(51, 'Leads / Senior Engineers / Engineers - Java / Spring Boot / Angular/React / Microservices', '', '636a9a6f88fb50.80613259.png', '2022-11-08', '2022-12-02', 0, 0, NULL, 1, 12, 12, 'All Locations'),
(52, 'SAP Functional Consultant - Product Planning', '', '636a9aa9b116e5.68004822.png', '2022-11-08', '2022-12-07', 0, 0, NULL, 4, 12, 12, 'All Locations'),
(53, 'SAP Functional Consultant - Material Management', '', '636a9af641ced1.62005383.png', '2022-11-08', '2022-11-30', 0, 0, NULL, 5, 12, 12, 'All Locations');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `manager_id` varchar(12) DEFAULT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`, `description`, `manager_id`, `isactive`) VALUES
(1, 'IT-Software / Internet', '', '981245692V', 1),
(2, 'IT-Hardware / Network / System', '', '199855648787', 1),
(3, 'Sales / Marketing', '', '200045177878', 1),
(4, 'Business Management', '', '199845755555', 1),
(5, 'Banking &amp; Finance', '', '199958487777', 1),
(6, 'Food Industry', '', '967528832v', 1),
(7, 'Media / Communication', '', '978692245v', 1),
(8, 'Engineering / Manufacturing', '', '200045789999', 1),
(9, 'Hotel / Leasure', '', '975822553v', 1),
(10, 'Apparel', '', NULL, 0),
(11, 'Hospital', '', '985302283v', 1),
(12, 'Human Resource (HR)', '', '968752286v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_role`
--

CREATE TABLE `job_role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_role`
--

INSERT INTO `job_role` (`id`, `name`, `isactive`) VALUES
(1, 'Admin', 1),
(2, 'Manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_save`
--

CREATE TABLE `job_save` (
  `job_seeker_id` varchar(12) NOT NULL,
  `job_ref_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_save`
--

INSERT INTO `job_save` (`job_seeker_id`, `job_ref_no`) VALUES
('199810015454', 2),
('199810015454', 5),
('199810015454', 8),
('199810015454', 11),
('982890659V', 8),
('982890659V', 10);

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `nic` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gender` char(1) NOT NULL,
  `cv` varchar(250) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `job_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`nic`, `name`, `email`, `password`, `gender`, `cv`, `phone_no`, `location`, `job_category_id`) VALUES
('199810015454', 'Supun Madusha', 'supun@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '63692e206c1cc8.68671135.pdf', '789999994', 'Colombo', 2),
('200011400189', 'Anjana', 'anjana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636a3e319f46f6.79166885.pdf', '761478526', 'Anuradapura', 5),
('200078945635', 'Gayan', 'gayan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636a3dab1f7ef2.17573020.pdf', '785969365', 'Batticola', 4),
('200417893214', 'Isuru', 'isuru@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636a3d44057768.68544171.pdf', '757896542', 'Matale', 3),
('658974123V', 'kamala', 'kamala@gmail.om', '25d55ad283aa400af464c76d713c07ad', 'F', '636a3ff15d8312.58290415.pdf', '716564123', 'Ampara', 8),
('7984564582V', 'Sanuki', 'sanuki@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'F', '636a3f300f52a6.86151510.pdf', '779635697', 'Monaragala', 6),
('852963741V', 'Aruni', 'aruni@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'F', '636a3f8da694e9.43149082.pdf', '747112365', 'Badulla', 7),
('894561237V', 'Kasun', 'kasun@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636a3ca6e428a8.68055094.pdf', '778569324', 'Galle', 2),
('897456924V', 'Anula', 'anula@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'F', '636a405ae9d173.16809541.pdf', '758974632', 'Ratnapura', 9),
('981234567V', 'Navod', 'navod@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636a3c2ae49433.45803463.pdf', '719835135', 'Matara', 1),
('982890659V', 'Dakshina Shashimal Lokubalasuriya', 'dakshina@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'M', '636939e815bb42.50046036.pdf', '0719015133', 'Gampaha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `isactive`) VALUES
(10, 'Full time', 1),
(11, 'Part time', 1),
(12, 'Permanent', 1),
(13, 'Temporary', 1),
(14, 'dd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nic` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` varchar(35) NOT NULL,
  `image` text DEFAULT NULL,
  `job_role_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nic`, `name`, `address`, `email`, `phone_no`, `gender`, `password`, `image`, `job_role_id`, `isactive`) VALUES
('199845755555', 'Yasiru Samarasekara', 'Pasyala', 'yasiru@gmail.com', '0712458999', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('199855648787', 'Kithma Kavindi Lunuwila', 'Matara', 'kithma@gmail.com', '0774875555', 'F', '25d55ad283aa400af464c76d713c07ad', '6364a973cdd586.60172575.jpg', 2, 1),
('199958487777', 'Salini Maduwanthi', 'Galle', 'salini@gmail.com', '0714578999', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('200045177878', 'Pubudu Gayashan', 'Kurunegala', 'pubudu@gmail.com', '0714578888', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('200045789999', 'Sahan Palamkuburage', 'Kandy', 'sahan@gmail.com', '0754899999', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('954820062v', 'Avishka Kodithuvakku', 'Matara', 'avishka@gmail.com', '0745869520', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('958862573v', 'Navod Navarathna', 'Kaluthara', 'navarathna@gmail.com', '0751212541', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('967528832v', 'Hirushi Gajanayake', 'Galle', 'hirushi@gmail.com', '0787485958', 'F', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('968752286v', 'Thiran Thennakon', 'Colombo', 'thiran@gmail.com', '0745860228', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('975822553v', 'Kasun Idikatiya', 'Matara', 'kasun@gmail.com', '0740560882', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('978692245v', 'sajini Hewage', 'Panadura', 'sajini@gmail.com', '0715886985', 'F', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('981245692V', 'Vihanga Bimsara', 'Walapane', 'vihanga@gmail.com', '0754187897', 'M', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('982890659v', 'Dakshina Shashimal Lokubalasuriya', 'Gampaha', 'shashimaldakshina1@gmail.com', '0719015135', 'M', '25d55ad283aa400af464c76d713c07ad', '63626e9978f989.44400830.jpg', 1, 1),
('985302283v', 'Prarthana Madurangi', 'Kaluthara', 'parthana@gmail.com', '0710450636', 'F', '25d55ad283aa400af464c76d713c07ad', '', 2, 1),
('986384923V', 'Sandeep Kaushan', 'Matara', 'sandeep.kaushan@gmail.com', '0755555555', 'M', '25d55ad283aa400af464c76d713c07ad', '6364a5c8b2d808.15375849.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_allocate`
--

CREATE TABLE `time_allocate` (
  `applied_job_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `interview_timeslot_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_allocate`
--

INSERT INTO `time_allocate` (`applied_job_id`, `employer_id`, `interview_timeslot_id`, `date`) VALUES
(3, 8, 9, '2022-11-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_job_seekerdd` (`job_seeker_id`),
  ADD KEY `f_job_refnodd` (`job_ref_no`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_job_seeker` (`job_seeker_id`),
  ADD KEY `f_employer` (`employer_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_staffid` (`staff_id`);

--
-- Indexes for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_employer1` (`employer_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_ref_no`),
  ADD KEY `f_categoryj` (`job_category_id`),
  ADD KEY `f_typej` (`job_type_id`),
  ADD KEY `f_employerj` (`employer_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_manager_id` (`manager_id`);

--
-- Indexes for table `job_role`
--
ALTER TABLE `job_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_save`
--
ALTER TABLE `job_save`
  ADD PRIMARY KEY (`job_seeker_id`,`job_ref_no`),
  ADD KEY `f_job_refnoss` (`job_ref_no`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `f_job_category` (`job_category_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `f_job_role` (`job_role_id`);

--
-- Indexes for table `time_allocate`
--
ALTER TABLE `time_allocate`
  ADD PRIMARY KEY (`applied_job_id`,`employer_id`,`interview_timeslot_id`),
  ADD KEY `f_employert` (`employer_id`),
  ADD KEY `f_timeslot` (`interview_timeslot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_ref_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_role`
--
ALTER TABLE `job_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD CONSTRAINT `f_job_refnodd` FOREIGN KEY (`job_ref_no`) REFERENCES `job` (`job_ref_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seekerdd` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `f_employer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seeker` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `f_staffid` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  ADD CONSTRAINT `f_employer1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `f_categoryj` FOREIGN KEY (`job_category_id`) REFERENCES `job_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_employerj` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_typej` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_category`
--
ALTER TABLE `job_category`
  ADD CONSTRAINT `f_manager_id` FOREIGN KEY (`manager_id`) REFERENCES `staff` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `job_save`
--
ALTER TABLE `job_save`
  ADD CONSTRAINT `f_job_refnoss` FOREIGN KEY (`job_ref_no`) REFERENCES `job` (`job_ref_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seekerss` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `f_job_category` FOREIGN KEY (`job_category_id`) REFERENCES `job_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `f_job_role` FOREIGN KEY (`job_role_id`) REFERENCES `job_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `time_allocate`
--
ALTER TABLE `time_allocate`
  ADD CONSTRAINT `f_applied_jobt` FOREIGN KEY (`applied_job_id`) REFERENCES `applied_job` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_employert` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_timeslot` FOREIGN KEY (`interview_timeslot_id`) REFERENCES `interview_timeslot` (`id`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `updateStatusofJob` ON SCHEDULE EVERY 1 DAY STARTS '2022-09-21 00:45:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE job SET active =0, status=3  where CURDATE() =closing_date and status=1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
