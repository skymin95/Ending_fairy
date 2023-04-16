-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-04-16 10:43
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `canonacademy`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board_community`
--

CREATE TABLE `board_community` (
  `community_id` int(11) NOT NULL COMMENT '번호',
  `community_title` varchar(255) NOT NULL COMMENT '제목',
  `community_content` text NOT NULL COMMENT '내용',
  `community_wdate` datetime NOT NULL COMMENT '작성일',
  `community_parent_id` int(11) DEFAULT NULL COMMENT '부모번호(존재할시 댓글)',
  `mb_no` int(11) NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `board_event`
--

CREATE TABLE `board_event` (
  `event_id` varchar(255) NOT NULL COMMENT '번호',
  `event_title` varchar(255) NOT NULL COMMENT '제목',
  `event_content` varchar(255) NOT NULL COMMENT '내용',
  `event_wdate` varchar(255) NOT NULL COMMENT '작성일',
  `event_sdate` varchar(255) NOT NULL COMMENT '이벤트시작일',
  `event_edate` varchar(255) NOT NULL COMMENT '이벤트종료일',
  `fileID` varchar(255) DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `board_faq`
--

CREATE TABLE `board_faq` (
  `faq_id` int(11) NOT NULL COMMENT '번호',
  `faq_parent_id` int(11) NOT NULL COMMENT '부모번호(존재할시 질문에 대한 답변)',
  `faq_content` text NOT NULL COMMENT '내용'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `board_notice`
--

CREATE TABLE `board_notice` (
  `notice_id` int(11) NOT NULL COMMENT '번호',
  `notice_title` varchar(255) NOT NULL COMMENT '제목',
  `notice_content` text NOT NULL COMMENT '내용',
  `notice_wdate` datetime NOT NULL COMMENT '작성일',
  `mb_no` int(11) NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `board_question`
--

CREATE TABLE `board_question` (
  `question_id` int(11) NOT NULL COMMENT '번호',
  `question_parent_id` int(11) DEFAULT NULL COMMENT '문의의 question_id를 입력(존재할시 답변)',
  `question_title` varchar(255) DEFAULT NULL COMMENT '제목',
  `question_content` text NOT NULL COMMENT '내용',
  `question_wdate` datetime NOT NULL COMMENT '작성일',
  `mb_no` int(11) NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL COMMENT '번호',
  `mb_no` int(11) NOT NULL COMMENT '회원번호',
  `course_id` int(11) NOT NULL COMMENT '강의번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `coupon_list`
--

CREATE TABLE `coupon_list` (
  `coupon_no` int(11) NOT NULL COMMENT '번호(고유값)',
  `coupon_title` varchar(255) NOT NULL COMMENT '제목',
  `coupon_code` varchar(255) NOT NULL COMMENT '쿠폰코드',
  `coupon_sdate` datetime DEFAULT NULL COMMENT '쿠폰기간(시작일)',
  `coupon_edate` datetime DEFAULT NULL COMMENT '쿠폰기간(종료일)',
  `coupon_count` int(11) DEFAULT NULL COMMENT '쿠폰사용횟수',
  `coupon_sale` varchar(255) DEFAULT NULL COMMENT '쿠폰할인(할인율 or 할인가)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `coupon_status`
--

CREATE TABLE `coupon_status` (
  `coupon_status` tinyint(4) DEFAULT NULL COMMENT '사용여부(0 or 1)',
  `coupon_no` int(11) NOT NULL COMMENT '쿠폰번호(고유값)',
  `mb_no` int(11) NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL COMMENT '강의번호',
  `course_title` varchar(255) NOT NULL COMMENT '제목',
  `course_cate` varchar(50) NOT NULL COMMENT '강의분류(온라인,오프라인)',
  `course_edu_time` varchar(20) NOT NULL COMMENT '강의시간(?시간 or ?일)',
  `course_teacher` varchar(50) DEFAULT NULL COMMENT '강사명',
  `course_price` int(11) NOT NULL DEFAULT 0 COMMENT '강의가격',
  `course_ask_sdate` datetime DEFAULT NULL COMMENT '강의신청기간(시작일)',
  `course_ask_edate` datetime DEFAULT NULL COMMENT '강의신청기간(종료일)',
  `course_edu_sdate` datetime DEFAULT NULL COMMENT '강의교육기간(시작일)',
  `course_edu_edate` datetime DEFAULT NULL COMMENT '강의교육기간(종료일)',
  `course_tag` varchar(255) NOT NULL COMMENT '강의태그(초보자, 사진, 영상) 반점으로 구분',
  `course_link` varchar(255) DEFAULT NULL COMMENT '강의미리보기(유튜브링크)',
  `course_content` text DEFAULT NULL COMMENT '강의소개',
  `mb_no` int(11) NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_cate`, `course_edu_time`, `course_teacher`, `course_price`, `course_ask_sdate`, `course_ask_edate`, `course_edu_sdate`, `course_edu_edate`, `course_tag`, `course_link`, `course_content`, `mb_no`) VALUES
(1, 'EOS R5 & R6 사용법', '오프라인', '14시간', '김민석', 500000, '2023-03-19 16:58:54', '2023-04-21 16:58:54', '2023-04-22 16:58:54', '2023-04-22 16:58:54', '사진,편집,사진찍기,디카', 'https://www.youtube.com/watch?v=LEb4Ww29p4A', '강의 소개\r\n 일시 	 강의명	 강의 장소\r\n 2023-04-22 14:30~16:30	EOS R5 & R6 사용법 1	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n 2023-04-22 16:30~18:30	EOS R5 & R6 사용법 2	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n', 2),
(2, '풍경 사진 마스터 -바다열차 편-', '온라인', '150시간', '김민석', 55000, '2023-03-19 16:58:54', '2023-04-21 16:58:54', '2023-04-23 00:00:00', '2023-04-23 00:00:00', '사진,편집,사진찍기,디카', 'https://www.youtube.com/watch?v=LEb4Ww29p4A', '강의 소개\r\n 일시 	 강의명	 강의 장소\r\n 2023-04-22 14:30~16:30	EOS R5 & R6 사용법 1	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n 2023-04-22 16:30~18:30	EOS R5 & R6 사용법 2	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `course_index`
--

CREATE TABLE `course_index` (
  `index_id` int(11) NOT NULL COMMENT '번호',
  `chapter` varchar(255) NOT NULL COMMENT '챕터',
  `class` varchar(255) DEFAULT NULL COMMENT '차시(존재할경우 해당 데이터는 차시)',
  `class_link` varchar(255) DEFAULT NULL COMMENT '강의링크(유튜브링크)',
  `course_id` int(11) NOT NULL COMMENT '강의번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `course_review`
--

CREATE TABLE `course_review` (
  `review_id` int(11) NOT NULL COMMENT '번호',
  `review_title` varchar(255) NOT NULL COMMENT '제목',
  `review_content` text NOT NULL COMMENT '내용',
  `review_star` tinyint(4) NOT NULL DEFAULT 1 COMMENT '별점(1 ~ 5)',
  `review_wdate` datetime NOT NULL COMMENT '작성일',
  `course_id` int(11) NOT NULL COMMENT '강의번호',
  `mb_no` int(11) NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `course_status`
--

CREATE TABLE `course_status` (
  `status` varchar(50) DEFAULT NULL COMMENT '진도율(시:분:초 로 본 시간 표기)',
  `course_id` int(11) NOT NULL COMMENT '강의번호',
  `mb_no` int(11) NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `mb_no` int(11) NOT NULL COMMENT '회원번호',
  `mb_id` varchar(20) NOT NULL COMMENT '회원아이디',
  `mb_password` varchar(255) NOT NULL COMMENT '회원비밀번호',
  `mb_name` varchar(255) NOT NULL COMMENT '회원이름',
  `mb_nick` varchar(255) DEFAULT NULL COMMENT '회원닉네임',
  `mb_email` varchar(255) NOT NULL COMMENT '회원이메일',
  `mb_level` tinyint(4) NOT NULL DEFAULT 1 COMMENT '회원레벨(1 ~ 10)',
  `mb_birth` datetime DEFAULT NULL COMMENT '회원생일',
  `mb_tel` varchar(255) DEFAULT NULL COMMENT '회원전화번호',
  `mb_sns` tinyint(4) DEFAULT NULL COMMENT '메일수신여부(0 or 1)',
  `mb_1` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_2` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_3` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_4` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_5` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_6` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_7` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_8` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_9` varchar(255) DEFAULT NULL COMMENT '여분필드',
  `mb_10` varchar(255) DEFAULT NULL COMMENT '여분필드'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`mb_no`, `mb_id`, `mb_password`, `mb_name`, `mb_nick`, `mb_email`, `mb_level`, `mb_birth`, `mb_tel`, `mb_sns`, `mb_1`, `mb_2`, `mb_3`, `mb_4`, `mb_5`, `mb_6`, `mb_7`, `mb_8`, `mb_9`, `mb_10`) VALUES
(1, 'test', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `upload_file`
--

CREATE TABLE `upload_file` (
  `fileID` varchar(255) NOT NULL COMMENT '파일ID',
  `nameOrigin` varchar(255) NOT NULL COMMENT '사용자가 업로드한 파일명',
  `nameSave` varchar(255) NOT NULL COMMENT '서버에 업로드된 파일명',
  `wdate` datetime NOT NULL COMMENT '작성일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board_community`
--
ALTER TABLE `board_community`
  ADD PRIMARY KEY (`community_id`),
  ADD UNIQUE KEY `community_id` (`community_id`);

--
-- 테이블의 인덱스 `board_event`
--
ALTER TABLE `board_event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id` (`event_id`);

--
-- 테이블의 인덱스 `board_faq`
--
ALTER TABLE `board_faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD UNIQUE KEY `faq_id` (`faq_id`);

--
-- 테이블의 인덱스 `board_notice`
--
ALTER TABLE `board_notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD UNIQUE KEY `notice_id` (`notice_id`);

--
-- 테이블의 인덱스 `board_question`
--
ALTER TABLE `board_question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_id` (`question_id`);

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- 테이블의 인덱스 `coupon_list`
--
ALTER TABLE `coupon_list`
  ADD PRIMARY KEY (`coupon_no`),
  ADD UNIQUE KEY `coupon_no` (`coupon_no`);

--
-- 테이블의 인덱스 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- 테이블의 인덱스 `course_index`
--
ALTER TABLE `course_index`
  ADD PRIMARY KEY (`index_id`),
  ADD UNIQUE KEY `index_id` (`index_id`);

--
-- 테이블의 인덱스 `course_review`
--
ALTER TABLE `course_review`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `review_id` (`review_id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mb_no`),
  ADD UNIQUE KEY `mb_no` (`mb_no`);

--
-- 테이블의 인덱스 `upload_file`
--
ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`fileID`),
  ADD UNIQUE KEY `fileID` (`fileID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board_community`
--
ALTER TABLE `board_community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `board_faq`
--
ALTER TABLE `board_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `board_notice`
--
ALTER TABLE `board_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `board_question`
--
ALTER TABLE `board_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `coupon_list`
--
ALTER TABLE `coupon_list`
  MODIFY `coupon_no` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호(고유값)';

--
-- 테이블의 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '강의번호', AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `course_index`
--
ALTER TABLE `course_index`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `course_review`
--
ALTER TABLE `course_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호';

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `mb_no` int(11) NOT NULL AUTO_INCREMENT COMMENT '회원번호', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
