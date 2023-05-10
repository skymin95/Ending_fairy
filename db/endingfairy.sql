CREATE TABLE `board_community` (
  `community_id` int NOT NULL COMMENT '번호',
  `community_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `community_content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용',
  `community_wdate` datetime NOT NULL COMMENT '작성일',
  `community_parent_id` int DEFAULT NULL COMMENT '부모번호(존재할시 댓글)',
  `mb_no` int NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `board_community` (`community_id`, `community_title`, `community_content`, `community_wdate`, `community_parent_id`, `mb_no`, `fileID`) VALUES
(1, '커뮤뮤뮤뮤뮤니티', '커뮤니티다.', '2023-04-17 15:37:16', NULL, 1, 'df8dfcccb5340a59fcde97360ae6aced');







CREATE TABLE `board_event` (
  `event_id` int NOT NULL COMMENT '번호',
  `event_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `event_content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용',
  `event_wdate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '작성일',
  `event_sdate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '이벤트시작일',
  `event_edate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '이벤트종료일',
  `mb_no` int DEFAULT NULL COMMENT '회원번호',
  `fileID` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `board_event` (`event_id`, `event_title`, `event_content`, `event_wdate`, `event_sdate`, `event_edate`, `mb_no`, `fileID`) VALUES
(1, '이벤트에용', '내용이에용용', '2023-04-17 16:56:31', '2023-04-17', '2023-04-21', 1, '3418e58933cfc23ae5c0ca11e6e9a103');







CREATE TABLE `board_faq` (
  `faq_id` int NOT NULL COMMENT '번호',
  `faq_parent_id` int NOT NULL COMMENT '부모번호(존재할시 질문에 대한 답변)',
  `faq_content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `board_notice` (
  `notice_id` int NOT NULL COMMENT '번호',
  `notice_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `notice_content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용',
  `notice_wdate` datetime NOT NULL COMMENT '작성일',
  `mb_no` int NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `board_notice` (`notice_id`, `notice_title`, `notice_content`, `notice_wdate`, `mb_no`, `fileID`) VALUES
(4, '공지리지리직', '빠밤밤', '2023-04-17 16:08:44', 1, ''),
(5, '제목공지파일테스트', '제목공지파일테스트제목공지파일테스트제목공지파일테스트제목공지파일테스트제목공지파일테스트', '2023-04-17 17:48:09', 1, ''),
(6, 'ㅇㅁㄴㅇ', 'ㅁㄴㅇㅁㄴㅇ', '2023-04-17 17:51:15', 1, ''),
(7, 'ㅅㄷㄴㅅ', 'ㅅㄷㄴㅅ', '2023-04-17 17:53:19', 1, ''),
(8, 'ㅅㄷㄴㅅ', 'ㅅㄷㄴㅅ', '2023-04-17 17:56:10', 1, '61f39369f0ff3e07b106d9068928f0ab'),
(9, 'ㅅㄷㄴㅅ', 'ㅅㄷㄴㅅ', '2023-04-17 18:12:33', 1, '75cbdcc53338953b5c7576b54b628ba9');







CREATE TABLE `board_question` (
  `question_id` int NOT NULL COMMENT '번호',
  `question_parent_id` int DEFAULT NULL COMMENT '문의의 question_id를 입력(존재할시 답변)',
  `question_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '제목',
  `question_content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용',
  `question_wdate` datetime NOT NULL COMMENT '작성일',
  `mb_no` int NOT NULL COMMENT '회원번호',
  `fileID` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '파일ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `board_question` (`question_id`, `question_parent_id`, `question_title`, `question_content`, `question_wdate`, `mb_no`, `fileID`) VALUES
(1, NULL, '문의입니다.', '답변입니다.', '2023-04-14 08:38:51', 1, NULL),
(2, 1, NULL, '답변입니다.1', '2023-04-14 08:38:51', 1, NULL),
(3, NULL, '문의입니다.2', '답변입니다.2', '2023-04-14 08:38:51', 90, NULL),
(4, NULL, '문의입니다.3', '답변입니다.3', '2023-04-14 08:38:51', 90, NULL),
(5, NULL, '문의입니다.4', '답변입니다.4', '2023-04-14 08:38:51', 4, NULL),
(6, NULL, '문의입니다.5', '답변입니다.5', '2023-04-14 08:38:51', 4, NULL),
(7, NULL, '문의입니다.6', '답변입니다.6', '2023-04-14 08:38:51', 4, NULL),
(8, 4, NULL, '답변입니다.12', '2023-04-14 08:38:51', 4, NULL),
(9, NULL, '문의입니다.9', '답변입니다.9', '2023-04-14 08:38:51', 4, NULL),
(10, 7, NULL, '옛다 답변', '2023-04-17 18:48:59', 0, NULL);







CREATE TABLE `cart` (
  `cart_id` int NOT NULL COMMENT '번호',
  `mb_no` int NOT NULL COMMENT '회원번호',
  `course_id` int NOT NULL COMMENT '강의번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `coupon_list` (
  `coupon_no` int NOT NULL COMMENT '번호(고유값)',
  `coupon_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `coupon_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '쿠폰코드',
  `coupon_sdate` datetime DEFAULT NULL COMMENT '쿠폰기간(시작일)',
  `coupon_edate` datetime DEFAULT NULL COMMENT '쿠폰기간(종료일)',
  `coupon_count` int DEFAULT NULL COMMENT '쿠폰사용횟수',
  `coupon_sale` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '쿠폰할인(할인율 or 할인가)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `coupon_status` (
  `coupon_status` tinyint DEFAULT NULL COMMENT '사용여부(0 or 1)',
  `coupon_no` int NOT NULL COMMENT '쿠폰번호(고유값)',
  `mb_no` int NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `course` (
  `course_id` int NOT NULL COMMENT '강의번호',
  `course_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `course_cate` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '강의분류(온라인,오프라인)',
  `course_edu_time` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT '강의시간(?시간 or ?일)',
  `course_teacher` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '강사명',
  `course_price` int NOT NULL DEFAULT '0' COMMENT '강의가격',
  `course_ask_sdate` datetime DEFAULT NULL COMMENT '강의신청기간(시작일)',
  `course_ask_edate` datetime DEFAULT NULL COMMENT '강의신청기간(종료일)',
  `course_edu_sdate` datetime DEFAULT NULL COMMENT '강의교육기간(시작일)',
  `course_edu_edate` datetime DEFAULT NULL COMMENT '강의교육기간(종료일)',
  `course_tag` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '강의태그(초보자, 사진, 영상) 반점으로 구분',
  `course_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '강의미리보기(유튜브링크)',
  `course_content` text COLLATE utf8mb4_general_ci COMMENT '강의소개',
  `mb_no` int NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `course` (`course_id`, `course_title`, `course_cate`, `course_edu_time`, `course_teacher`, `course_price`, `course_ask_sdate`, `course_ask_edate`, `course_edu_sdate`, `course_edu_edate`, `course_tag`, `course_link`, `course_content`, `mb_no`) VALUES
(1, 'EOS R5 & R6 사용법', '오프라인', '14시간', '김민석', 500000, '2023-03-19 16:58:54', '2023-04-21 16:58:54', '2023-04-22 16:58:54', '2023-04-22 16:58:54', '사진,편집,사진찍기,디카', 'https://www.youtube.com/watch?v=LEb4Ww29p4A', '강의 소개\r\n 일시 	 강의명	 강의 장소\r\n 2023-04-22 14:30~16:30	EOS R5 & R6 사용법 1	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n 2023-04-22 16:30~18:30	EOS R5 & R6 사용법 2	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n', 2),
(2, '풍경 사진 마스터 -바다열차 편-', '온라인', '150시간', '김민석', 55000, '2023-03-19 16:58:54', '2023-04-21 16:58:54', '2023-04-23 00:00:00', '2023-04-23 00:00:00', '사진,편집,사진찍기,디카', 'https://www.youtube.com/watch?v=LEb4Ww29p4A', '강의 소개\r\n 일시 	 강의명	 강의 장소\r\n 2023-04-22 14:30~16:30	EOS R5 & R6 사용법 1	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n 2023-04-22 16:30~18:30	EOS R5 & R6 사용법 2	서울 강남구 봉은사로 217 캐논플렉스 4층 캐논아카데미\r\n', 2);







CREATE TABLE `course_index` (
  `index_id` int NOT NULL COMMENT '번호',
  `chapter_id` int DEFAULT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '챕터',
  `class` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '차시(존재할경우 해당 데이터는 차시)',
  `class_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '강의링크(유튜브링크)',
  `course_id` int NOT NULL COMMENT '강의번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `course_review` (
  `review_id` int NOT NULL COMMENT '번호',
  `review_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '제목',
  `review_content` text COLLATE utf8mb4_general_ci NOT NULL COMMENT '내용',
  `review_star` tinyint NOT NULL DEFAULT '1' COMMENT '별점(1 ~ 5)',
  `review_wdate` datetime NOT NULL COMMENT '작성일',
  `course_id` int NOT NULL COMMENT '강의번호',
  `mb_no` int NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `course_status` (
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '진도율(시:분:초 로 본 시간 표기)',
  `course_id` int NOT NULL COMMENT '강의번호',
  `mb_no` int NOT NULL COMMENT '회원번호'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;







CREATE TABLE `member` (
  `mb_no` int NOT NULL COMMENT '회원번호',
  `mb_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT '회원아이디',
  `mb_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '회원비밀번호',
  `mb_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '회원이름',
  `mb_nick` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '회원닉네임',
  `mb_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '회원이메일',
  `mb_level` tinyint NOT NULL DEFAULT '1' COMMENT '회원레벨(1 ~ 10)',
  `mb_birth` datetime DEFAULT NULL COMMENT '회원생일',
  `mb_tel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '회원전화번호',
  `mb_sns` tinyint DEFAULT NULL COMMENT '메일수신여부(0 or 1)',
  `mb_1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_5` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_6` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_7` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_8` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_9` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드',
  `mb_10` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '여분필드'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `member` (`mb_no`, `mb_id`, `mb_password`, `mb_name`, `mb_nick`, `mb_email`, `mb_level`, `mb_birth`, `mb_tel`, `mb_sns`, `mb_1`, `mb_2`, `mb_3`, `mb_4`, `mb_5`, `mb_6`, `mb_7`, `mb_8`, `mb_9`, `mb_10`) VALUES
(1, 'test', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 10, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'test1', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'test2', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'test13s', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'test2', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test13b', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'test24', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'test1359', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'test2', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'test13a', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'test24', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'test135q', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'test27', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'test138', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'test249', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'test13510e', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'test2', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'test13e', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'test24', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'test135w', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'test27', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'test138', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'test249', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'test13510f', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'test214', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'test1315g', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'test2416', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'test1351a7', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'test2718', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'test13819', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'test24920', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'test1351021h', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'test2', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'test13', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'test24', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'test135', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'test27', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'test138', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'test249', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'test13510g', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'test214', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'test1315', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'test2416', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'test13517', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'test2718', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'test13819', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'test24920', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'test1351021', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'test229', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'test1330', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'test2431', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'test13532', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'test2733', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'test13834', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'test24935', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'test1351036', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'test21437', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'test131538', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'test241639', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'test1351740', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'test271841', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'test1381942', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'test2492043', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 1, '2020-08-05 00:00:00', '01052834326', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'test135102144', '$2y$10$AY3dbgCE0We9y2URkqpT2.SHyMSbnveiMt8aLg.igEUk64IEtg1dW', '강병영', '아가에요', 'quddud33@naver.com', 8, '2020-08-05 00:00:00', '01052834326', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);







CREATE TABLE `upload_file` (
  `fileID` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '파일ID',
  `nameOrigin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '사용자가 업로드한 파일명',
  `nameSave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '서버에 업로드된 파일명',
  `wdate` datetime NOT NULL COMMENT '작성일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





INSERT INTO `upload_file` (`fileID`, `nameOrigin`, `nameSave`, `wdate`) VALUES
('3418e58933cfc23ae5c0ca11e6e9a103', '포지션설명.png', 'f6701791b4e4fb7c0aaff4bf16665be3.png', '2023-04-17 18:16:02'),
('61f39369f0ff3e07b106d9068928f0ab', '포지션설명.png', 'ad9e84d2f44f0a2073c21480a08629a0.png', '2023-04-17 17:56:10'),
('75cbdcc53338953b5c7576b54b628ba9', '포지션설명.png', 'e54b6ec4dc452309de8cb8ea5fbf9157.png', '2023-04-17 18:13:37'),
('df8dfcccb5340a59fcde97360ae6aced', 'index.html', 'a437aa977aab5ae3b4fee6397a3d5235.html', '2023-04-17 18:16:15'),
('f77c51c4b9cab713c2ee7408dcb474ec', '포지션설명2.png', '1a1a0658dd6c3be3832b6641a8b4d88b.png', '2023-04-17 18:12:33');








ALTER TABLE `board_community`
  ADD PRIMARY KEY (`community_id`),
  ADD UNIQUE KEY `community_id` (`community_id`);




ALTER TABLE `board_event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id` (`event_id`);




ALTER TABLE `board_faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD UNIQUE KEY `faq_id` (`faq_id`);




ALTER TABLE `board_notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD UNIQUE KEY `notice_id` (`notice_id`);




ALTER TABLE `board_question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_id` (`question_id`);




ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);




ALTER TABLE `coupon_list`
  ADD PRIMARY KEY (`coupon_no`),
  ADD UNIQUE KEY `coupon_no` (`coupon_no`);




ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`);




ALTER TABLE `course_index`
  ADD PRIMARY KEY (`index_id`),
  ADD UNIQUE KEY `index_id` (`index_id`);




ALTER TABLE `course_review`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `review_id` (`review_id`);




ALTER TABLE `member`
  ADD PRIMARY KEY (`mb_no`),
  ADD UNIQUE KEY `mb_no` (`mb_no`);




ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`fileID`),
  ADD UNIQUE KEY `fileID` (`fileID`);








ALTER TABLE `board_community`
  MODIFY `community_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `board_event`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `board_faq`
  MODIFY `faq_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `board_notice`
  MODIFY `notice_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `board_question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `coupon_list`
  MODIFY `coupon_no` int NOT NULL AUTO_INCREMENT COMMENT '번호(고유값)';




ALTER TABLE `course`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT COMMENT '강의번호';




ALTER TABLE `course_index`
  MODIFY `index_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `course_review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT COMMENT '번호';




ALTER TABLE `member`
  MODIFY `mb_no` int NOT NULL AUTO_INCREMENT COMMENT '회원번호';