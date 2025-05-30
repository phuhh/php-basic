CREATE TABLE Users(
ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Email VARCHAR(100) NOT NULL UNIQUE,
Password VARCHAR(50) NOT NULL,
FullName VARCHAR(100),
Phone VARCHAR(20),
ForgotToken VARCHAR(50),
ActiveToken VARCHAR(50),
Status TINYINT DEFAULT 0,
LastActivity DATETIME,
CreateAt DATETIME,
UpdateAt DATETIME
)

CREATE TABLE LoginToken(
ID INT NOT NULL PRIMARY KEY AUTO_INCRSEMENT,
UserID INT NOT NULL,
Token VARCHAR(50),
CreateAt DATETIME,
CONSTRAINT FK_LoginToken_Users FOREIGN KEY (UserID) REFERENCES Users(ID) 
)

INSERT INTO Users(`Email`, `Password`, `FullName`, `Phone`, `CreateAt`)
SELECT 'User10@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 10', '0123456789', NOW() UNION
SELECT 'User11@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 11', '0123456789', NOW() UNION
SELECT 'User12@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 12', '0123456789', NOW() UNION
SELECT 'User13@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 13', '0123456789', NOW() UNION
SELECT 'User14@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 14', '0123456789', NOW() UNION
SELECT 'User15@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 15', '0123456789', NOW() UNION
SELECT 'User16@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 16', '0123456789', NOW() UNION
SELECT 'User17@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 17', '0123456789', NOW() UNION
SELECT 'User18@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 18', '0123456789', NOW() UNION
SELECT 'User19@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 19', '0123456789', NOW() UNION
SELECT 'User20@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 20', '0123456789', NOW() UNION
SELECT 'User21@mail.com', '$2y$10$R8tWE1Xn10.TfCBDP6m5/.YMBYC7XDSdGE.MnQMSltWF96Q8cP5JK', 'USER 21', '0123456789', NOW()