USE tz_delta;

CREATE TABLE metrics
(
    id                     INT AUTO_INCREMENT PRIMARY KEY,
    date                   DATE NOT NULL,
    revenue                INT  NOT NULL,
    cash                   INT  NOT NULL,
    cashless               INT  NOT NULL,
    credit_cards           INT  NOT NULL,
    average_receipt        INT  NOT NULL,
    average_guest          INT  NOT NULL,
    removal_after_payment  INT  NOT NULL,
    removal_before_payment INT  NOT NULL,
    number_of_receipts     INT  NOT NULL,
    number_of_guests       INT  NOT NULL
);

INSERT INTO metrics (date, revenue, cash, cashless, credit_cards, average_receipt, average_guest, removal_after_payment,
                     removal_before_payment, number_of_receipts, number_of_guests)
VALUES ('2024-05-21', 500521, 300000, 100000, 100521, 1300, 1200, 1000, 1300, 34, 34),
       ('2024-05-20', 480521, 300000, 100000, 100521, 900, 800, 1100, 1300, 36, 36),
       ('2024-05-19', 4805121, 300000, 100000, 100521, 1300, 800, 900, 0, 34, 32);