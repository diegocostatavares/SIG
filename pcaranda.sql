/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : pcaranda

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-05-18 09:27:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alta_temporada
-- ----------------------------
DROP TABLE IF EXISTS `alta_temporada`;
CREATE TABLE `alta_temporada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alta_temporada
-- ----------------------------
INSERT INTO `alta_temporada` VALUES ('1', 'Carnaval 2016', '2016-02-05', '2016-02-10');
INSERT INTO `alta_temporada` VALUES ('2', 'Semana Santa 2016', '2016-03-25', '2016-03-27');
INSERT INTO `alta_temporada` VALUES ('3', 'Tiradentes 2016', '2016-04-21', '2016-04-24');
INSERT INTO `alta_temporada` VALUES ('4', 'Ferias de Julho 2016', '2016-07-09', '2016-07-31');
INSERT INTO `alta_temporada` VALUES ('5', 'Semana Saco Cheio 2016', '2016-10-08', '2016-10-16');
INSERT INTO `alta_temporada` VALUES ('6', 'Republica 2016', '2016-11-12', '2016-11-16');
INSERT INTO `alta_temporada` VALUES ('7', 'Ferias Dezembro 2016', '2016-12-17', '2016-12-31');
INSERT INTO `alta_temporada` VALUES ('9', 'Férias Escolares 2017', '2017-12-19', '2017-12-31');
INSERT INTO `alta_temporada` VALUES ('10', 'Férias Janeiro 2016', '2016-01-01', '2016-01-24');

-- ----------------------------
-- Table structure for apartamentos_tipos
-- ----------------------------
DROP TABLE IF EXISTS `apartamentos_tipos`;
CREATE TABLE `apartamentos_tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of apartamentos_tipos
-- ----------------------------
INSERT INTO `apartamentos_tipos` VALUES ('9', 'Single (Standart)');
INSERT INTO `apartamentos_tipos` VALUES ('10', 'Duplo (Standart) ');
INSERT INTO `apartamentos_tipos` VALUES ('11', 'Triplo (Standart)');
INSERT INTO `apartamentos_tipos` VALUES ('12', 'Quádruplo (Standart) ');
INSERT INTO `apartamentos_tipos` VALUES ('13', 'Quíntuplo (Standart)');
INSERT INTO `apartamentos_tipos` VALUES ('14', 'Single (Premiun)');
INSERT INTO `apartamentos_tipos` VALUES ('15', 'Duplo (Premiun)');
INSERT INTO `apartamentos_tipos` VALUES ('16', 'Triplo (Premiun)');
INSERT INTO `apartamentos_tipos` VALUES ('17', 'Quádruplo (Premiun)');
INSERT INTO `apartamentos_tipos` VALUES ('18', 'Quíntuplo (Premiun)');

-- ----------------------------
-- Table structure for canais
-- ----------------------------
DROP TABLE IF EXISTS `canais`;
CREATE TABLE `canais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pai` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `texto` text,
  `dthr_criacao` datetime DEFAULT NULL,
  `dthr_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_include` int(11) DEFAULT NULL,
  `mostra_menu` enum('n','s') DEFAULT 'n',
  `ordem` int(11) DEFAULT NULL,
  `ativo` enum('s','n') DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of canais
-- ----------------------------
INSERT INTO `canais` VALUES ('14', '0', 'A POUSADA CARANDÁ VILLE', '<p><strong>Voc&ecirc; e sua fam&iacute;lia Merecem Bonito</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Para voc&ecirc; desfrutar das mais belas paisagens, no melhor destino ecotur&iacute;stico do Brasil,&nbsp;<strong>a Pousada Carand&aacute; Ville</strong>&nbsp;, localizada a 200m do centro da cidade, &eacute; um&nbsp;Complexo de Hospedagem, configurado em blocos em diferentes partes do bairro onde estamos localizados , por isso o nome Carand&aacute; Ville , possui uma excelente estrutura , ambiente familiar, &nbsp;decora&ccedil;&atilde;o regional que mistura o rustico com o moderno utilizando cores alegres e aconchegantes .</p>\r\n\r\n<p>Nosso restaurante disponibiliza de pratos tipicos da regi&atilde;o ,onde voc&ecirc; ir&aacute; se deliciar com comidas regionais, tendo a op&ccedil;&atilde;o de incluir essas refei&ccedil;&otilde;es em sua hospedagem .</p>\r\n\r\n<p>Aos finais de semana e feriados m&uacute;sica ao vivo para seu happy hour , para eventos especiais temos a op&ccedil;&atilde;o de jantar tem&aacute;tico .</p>\r\n\r\n<p>Em nossa piscina, oferecemos aos finais de semana e feriados , aula de hidrogin&aacute;stica gratuita para nossos clientes.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>A Pousada Carand&aacute; Ville</strong>&nbsp;re&uacute;ne em um novo formato de hospedagem, uma localiza&ccedil;&atilde;o privilegiada, a combina&ccedil;&atilde;o perfeita entre apartamentos de classifica&ccedil;&atilde;o standart / turistica somada a uma&nbsp; excelente&nbsp; &aacute;rea verde onde &eacute; servido&nbsp; um excelente caf&eacute; da manh&atilde; estilo colonial.O novo formato Carand&aacute; Ville, coloca em pr&aacute;tica a expertise adquirida ao longo de sua hist&oacute;ria, com conceitos obrigat&oacute;rios que asseguram o elevado padr&atilde;o da marca.</p>\r\n\r\n<p>&nbsp;</p>', null, '2018-04-19 01:57:58', null, 'n', null, 's');
INSERT INTO `canais` VALUES ('15', null, 'TARIFÁRIO', '<h3>Tarif&aacute;rio</h3>\r\n\r\n<h3>BAIXA TEMPORADA</h3>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:407px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:17px; width:218px\">\r\n			<p><strong>APARTAMENTO</strong></p>\r\n			</td>\r\n			<td style=\"height:17px; width:189px\">\r\n			<p><strong>STANDARD</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15px; width:218px\">\r\n			<p>Apto Single</p>\r\n			</td>\r\n			<td style=\"height:15px; width:189px\">\r\n			<p>R$ 150,00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15px; width:218px\">\r\n			<p>Apto Duplo</p>\r\n			</td>\r\n			<td style=\"height:15px; width:189px\">\r\n			<p>R$ 185,00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; width:218px\">\r\n			<p>Apto Triplo</p>\r\n			</td>\r\n			<td style=\"height:17px; width:189px\">\r\n			<p>R$ 275,00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15px; width:218px\">\r\n			<p>Apto Qu&aacute;druplo</p>\r\n			</td>\r\n			<td style=\"height:15px; width:189px\">\r\n			<p>R$ 353,00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15px; width:218px\">\r\n			<p>Apto Qu&iacute;ntuplo</p>\r\n			</td>\r\n			<td style=\"height:15px; width:189px\">\r\n			<p>R$ 400,00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:17px; width:218px\">\r\n			<p>Crian&ccedil;as 05 a 10</p>\r\n			</td>\r\n			<td style=\"height:17px; width:189px\">\r\n			<p>R$ 75,00</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>As tarifas acima citadas &quot;n&atilde;o&quot;s&atilde;o validas para os per&iacute;odos de alt&iacute;ssima temporada , tais como : Festival de Inverno , F&eacute;rias Escolares, R&eacute;veillon , Carnaval e Feriados nacionais <strong>( Pre&ccedil;os sob consulta)</strong></li>\r\n	<li>Crian&ccedil;as de 0 a 05 anos &ndash; free quando dividirem o aptos com 02 adultos</li>\r\n	<li>Incluso na di&aacute;ria : caf&eacute; da manh&atilde;.</li>\r\n	<li>N&atilde;o cobramos taxa de servi&ccedil;o.</li>\r\n	<li>A di&aacute;ria inicia-se &agrave;s 14h e encerra-se &agrave;s 12h.</li>\r\n	<li>Caf&eacute; da manh&atilde;: 7:00h &agrave;s 9:00h</li>\r\n	<li>A reserva s&oacute; ser&aacute; efetuada ap&oacute;s o pagamento de 50% de sinal. O pagamento de sinal dever&aacute; ser feito no Banco do Brasil, solicitar os dados ao departamento de reservas. Favor remeter o comprovante de dep&oacute;sito via e-mail ou pelo telefone&nbsp;<a href=\"tel:%2867%293255-3553\" target=\"_blank\">(67)3255-3553</a>&nbsp;/&nbsp;<a href=\"tel:%28%2067%29%203255-4540\" target=\"_blank\">( 67) 3255-4540</a></li>\r\n	<li>Tarifas v&aacute;lidas at&eacute;&nbsp; 30/06/2017</li>\r\n</ul>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Pol&iacute;tica de cancelamento</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>Em caso de desist&ecirc;ncia n&atilde;o ser&aacute; devolvido o dep&oacute;sito de sinal de reservas, por&eacute;m o contratante adquire cr&eacute;dito de saldo em di&aacute;rias para futuras hospedagens a ser utilizado at&eacute; um prazo m&aacute;ximo de 90 dias da data do cancelamento, podendo ser sujeito a verifica&ccedil;&atilde;o de disponibilidade no per&iacute;odo solicitado. Sendo sujeito a varia&ccedil;&atilde;o de valores para mais ou para menos.</li>\r\n	<li>Ap&oacute;s a confirma&ccedil;&atilde;o da sua reserva informamos que se os h&oacute;spedes necessitarem sair antecipadamente ao per&iacute;odo que foi contratada a reserva, as mesmas di&aacute;rias n&atilde;o ser&atilde;o objeto de RESSARCIMENTO.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Recomenda&ccedil;&otilde;es Importantes</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>Para seu maior conforto: protetor solar, repelente, t&ecirc;nis e sapatos, m&aacute;quina fotogr&aacute;fica.</li>\r\n	<li><strong>Compre seus passeios antecipadamente , pois Bonito possui um limite di&aacute;rio de visita&ccedil;&atilde;o muito restrito , Consulte-nos !</strong></li>\r\n</ul>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p><strong>Calend&aacute;rio Alta Temporada 2016</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n			<p><strong>Per&iacute;odo</strong></p>\r\n			</th>\r\n			<th>\r\n			<p><strong>Feriado</strong></p>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>01/01/16&nbsp;- 24/01/16</p>\r\n			</td>\r\n			<td>\r\n			<p>F&eacute;rias Escolares</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>05/02/16&nbsp;- 10/02/16</p>\r\n			</td>\r\n			<td>\r\n			<p>Carnaval</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>25/03/16&nbsp;- 27/03/16</p>\r\n			</td>\r\n			<td>\r\n			<p>P&aacute;scoa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>21/04/16&nbsp;- 24/05/16</p>\r\n			</td>\r\n			<td>\r\n			<p>Tiradentes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>09/07/16&nbsp;- 31/07/16</p>\r\n			</td>\r\n			<td>\r\n			<p>F&eacute;rias Escolares</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>08/10/16&nbsp;- 16/10/16</p>\r\n			</td>\r\n			<td>\r\n			<p>ISemana do Saco Cheio</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>12/11/16&nbsp;- 15/11/16</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;Republica&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>17/12/16&nbsp;- 31/12/16</p>\r\n			</td>\r\n			<td>\r\n			<p>F&eacute;rias Escolares</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('16', null, 'PASSEIOS', '', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('17', null, 'ROTEIRO', '<p>tetseeee</p>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('18', null, 'Araras Hotel Rural', '<p><strong>ARARAS HOTEL RURAL</strong></p>\r\n\r\n<p>O Araras Hotel Rural &eacute; a perfeita integra&ccedil;&atilde;o entre conforto e natureza, pois dispomos de confort&aacute;veis instala&ccedil;&otilde;es que garantem uma experi&ecirc;ncia inesquec&iacute;vel, j&aacute; que associamos sua estada com aconchego e lazer em amplas su&iacute;tes e apartamentos equipados com Ar Condicionado, Frigobar e TV, al&eacute;m de um exclusivo balne&aacute;rio &agrave;s margens do Rio Formoso com suas &aacute;guas transparentes que d&atilde;o origem &agrave; piscinas naturais com diversas esp&eacute;cies de peixes, decks de pedra, cercado por uma exuberante mata virgem, de fauna e flora deslumbrantes e uma atmosfera encantadora.</p>\r\n\r\n<p><strong>REFEI&Ccedil;&Otilde;ES</strong></p>\r\n\r\n<p>Aprecie deliciosas iguarias da culin&aacute;ria regional em um delicioso caf&eacute; da manh&atilde; estilo colonial j&aacute; incluso nas di&aacute;rias, servimos tamb&eacute;m almo&ccedil;o e jantar e contamos ainda com op&ccedil;&otilde;es de por&ccedil;&otilde;es, aperitivos, lanches e drinks.&nbsp;<br />\r\n<br />\r\nOferecemos card&aacute;pios diferenciados e especialmente criados para casamentos, anivers&aacute;rios, debutantes, confraterniza&ccedil;&otilde;es, corporativos, religiosos, entre outros eventos, com muito charme, sabor e sofistica&ccedil;&atilde;o.</p>\r\n\r\n<p><strong>ALTERNATIVAS DE LAZER</strong></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>03 decks para acesso e banho no Rio Formoso</li>\r\n	<li>Bar e Restaurante</li>\r\n	<li>Piscina Adulta e Infantil</li>\r\n	<li>Campo de Futebol</li>\r\n	<li>Trilhas</li>\r\n	<li>Espa&ccedil;o externo para Eventos</li>\r\n	<li>Pista de Cooper Asfaltada</li>\r\n	<li>&nbsp;</li>\r\n	<li><strong>EVENTOS &amp; GRUPOS</strong></li>\r\n</ul>\r\n\r\n<p>Tra&ccedil;ando um perfil &uacute;nico em cada evento, o Araras Hotel Rural destaca-se pela infraestrutura, localiza&ccedil;&atilde;o privilegiada em meio &agrave; natureza e comprometimento com a qualidade. Com equipe composta por profissionais gabaritados, chefes renomados e colaboradores com experi&ecirc;ncia em atendimento de alto padr&atilde;o, dispomos de uma equipe que atende &agrave;s necessidades de qualquer categoria de evento.&nbsp;<br />\r\n<br />\r\nAraras Hotel Rural, seu evento simplesmente memor&aacute;vel!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('19', null, 'CONTATO', '', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('20', null, 'NOSSO CAFÉ DA MANHÃ', '<p>&nbsp; &nbsp; &nbsp;Para que o h&oacute;spede Carand&aacute; Ville tenha disposi&ccedil;&atilde;o e energia para realizar os passeios em Bonito-MS, servimos um delicioso caf&eacute; da manh&atilde; estilo colonial, que consiste numa vers&atilde;o avantajada do que normalmente comp&otilde;e a mesa de caf&eacute; de outros hot&eacute;is da regi&atilde;o. Composto&nbsp;por&nbsp;aproximadamente 40 itens nosso&nbsp; card&aacute;pio mistura receitas tradicionais da cultura regional&nbsp;como a sopa paraguaia, a chipa,o cabur&eacute;,a chipagua&ccedil;u, al&eacute;m de elementos&nbsp; ind&iacute;genas : bolo de mandioca com coco, al&eacute;m de alguns bolos e p&atilde;es funcionais para os adeptos do fitness, enriquecendo nossa culin&aacute;ria .</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Servimos tamb&eacute;m &nbsp;Granolas , cereais integrais , Iogurtes, &nbsp;gelatinas , mousses e variados sabores de sucos e ch&aacute;s naturais . A maioria dos produtos s&atilde;o&nbsp;artesanais.</p>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('21', null, 'ÁREA DE LAZER', '<p>O lazer recebe aten&ccedil;&atilde;o especial na <strong>Pousada Carand&aacute; Ville</strong>, toda nossa estrutura voltada aos momentos de descontra&ccedil;&atilde;o &eacute; pensada para se ajustar ao clima, &agrave;s caracter&iacute;sticas da &aacute;rea e&nbsp;principalmente&nbsp;aos costumes e a cultura aqui da regi&atilde;o, onde dispomos de Piscina com Cascata, espa&ccedil;o para Churrasco, e Quiosque em meio cen&aacute;rios com a arboriza&ccedil;&atilde;o feita basicamente com esp&eacute;cies brasileiras adaptadas &agrave;s caracter&iacute;sticas f&iacute;sicas e clim&aacute;ticas da regi&atilde;o, contribuindo para um perfeito equil&iacute;brio em jardins harmonizados com bancos de madeiras e canteiros ornamentais.</p>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('22', null, 'AGÊNCIA DE TURISMO', '<p>Com intuito de facilitar ainda mais suas f&eacute;rias, a Pousada Carand&aacute; possui ag&ecirc;ncia de turismo &nbsp;exclusiva que disponibiliza de todos os passeios da regi&atilde;o , sendo importante salientar que todos os pre&ccedil;os s&atilde;o tabelados e n&atilde;o possuem diverg&ecirc;ncia de uma ag&ecirc;ncia para a outra .<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\nRealizamos reservas de passeios, hospedagem, transporte terrestre, loca&ccedil;&atilde;o de ve&iacute;culos, passagem a&eacute;rea e possu&iacute;mos log&iacute;stica para eventos.&nbsp;</p>\r\n\r\n<p>Colocamos a disposi&ccedil;&atilde;o uma equipe de profissionais da regi&atilde;o, conhecedores dos produtos comercializados fazendo com que o atendimento seja din&acirc;mico e eficiente na venda dos nossos destinos. Inspirar, emocionar e surpreender, s&atilde;os os diferenciais da nossa empresa.<br />\r\n&nbsp;<br />\r\nOs produtos oferecidos v&atilde;o desde pacotes de lazer, eventos, encontros de neg&oacute;cios, viagens de incentivo ,Pacote especial &nbsp;Lua de mel e roteiros pr&eacute;-existentes a programas sob medida que atendem aos sonhos e perfil de cada cliente.&nbsp;</p>\r\n\r\n<p><a href=\"http://pousadacaranda.com.br/RoteirosClientes/add\">Simule aqui sua viagem</a>.</p>\r\n', null, null, null, 'n', null, 's');
INSERT INTO `canais` VALUES ('23', null, 'APARTAMENTOS', '<p><strong>Aconchego e Hospitalidade</strong></p>\r\n\r\n<p><strong>A Pousada Carand&aacute; Ville</strong> possui 02 classifica&ccedil;&otilde;es de apartamentos :</p>\r\n\r\n<p><strong>Apartamentos Premiuns</strong>&nbsp;&ndash; S&atilde;o aptos amplos e aconchegantes , alguns mais pr&oacute;ximos a piscina e outros localizados pr&oacute;ximos ao caf&eacute; da manh&atilde; . Equipados com Ar Condicionado, TV de LED e Frigobar, alguns com mezanino acomodando bem sua fam&iacute;lia e amigos ,possui tamb&eacute;m internet WIFI gr&aacute;tis e estacionamento privativo .</p>\r\n\r\n<p><strong>Apartamentos &nbsp;Standarts</strong><strong>&nbsp;</strong>&ndash; Localizados em frente a recep&ccedil;&atilde;o a 60 mts da piscina, integrados por uma faixa de pedestre, s&atilde;o um pouco menores mas muito confort&aacute;veis, &nbsp;equipados com Ar&nbsp;Condicionado e TV LED, todos possuem frigobar, internet WIFI gr&aacute;tis e estacionamento privativo.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tanto os Apartamentos Premium como os Apartamentos Standarts s&atilde;o identificados por animais da regi&atilde;o, assim voc&ecirc; j&aacute; se interage e diverte com nossa fauna.</p>\r\n\r\n<p>&nbsp;</p>\r\n', null, null, null, 'n', null, 's');

-- ----------------------------
-- Table structure for contatos
-- ----------------------------
DROP TABLE IF EXISTS `contatos`;
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `mensagem` text,
  `dthr_envio` datetime DEFAULT NULL,
  `dthr_leitura` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lida` enum('s','n') DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contatos
-- ----------------------------
INSERT INTO `contatos` VALUES ('230', 'THAIS LOPES DE ABREU', 'BELO HORIZONTE', 'thaislopesdeabreu@gmail.com', '31991823671', ' Boa noite! Em 2014 nos hospedamos aí na Pousada Carandá e adoramos!! Queremos voltar a Bonito novamente e gostaria de dar prioridade a vocês que nos atenderam tão bem.\r\n\r\nPoderia me enviar um orçamento de hospedagem e passeios, conforme abaixo:\r\n\r\n=> Hospedagem: 02/01/2018 a 10/01/2018 com os seguintes passeios:\r\n\r\nAquário Natural Trilha e Flutuação\r\nRecanto Ecológico Rio da Prata c/ almoço\r\nPraia da Figueira\r\nBoca da Onça c/ almoço\r\nParque das Cachoeiras c/ almoço\r\n\r\n Se possível gostaríamos de ficar em algum quarto sossegado, sem barulho.\r\n\r\n=> A condição de pagamento é somente essa (entrada de 50% e o restante na pousada) ou é possível uma negociação? Algum outro tipo de parcelamento?\r\n\r\nObrigada aguardo seu retorno.\r\n\r\nThaís.\r\n', '2017-02-28 09:40:33', null, 'n');

-- ----------------------------
-- Table structure for depoimentos
-- ----------------------------
DROP TABLE IF EXISTS `depoimentos`;
CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `texto` text,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ativo` enum('s','n') DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of depoimentos
-- ----------------------------
INSERT INTO `depoimentos` VALUES ('2', 'asdasdasd', 'asdasdasdasdasdas', 'asdasdsad', '2014-08-23 02:58:00', '2018-04-18 23:46:12', 'n');

-- ----------------------------
-- Table structure for destaques
-- ----------------------------
DROP TABLE IF EXISTS `destaques`;
CREATE TABLE `destaques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_canal` int(11) DEFAULT NULL,
  `titulo` text,
  `texto` text,
  `ativo` enum('s','n') DEFAULT NULL,
  `ordem` int(4) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL,
  `imagem` text,
  `video` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idCanal` (`id_canal`),
  CONSTRAINT `idCanal` FOREIGN KEY (`id_canal`) REFERENCES `canais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of destaques
-- ----------------------------
INSERT INTO `destaques` VALUES ('1', null, '1', null, null, null, null, null, null, null, null, null);
INSERT INTO `destaques` VALUES ('2', '14', 'XXXXX', 'asdasdasd', 's', '4', 'asdasd', 'PF', 'imagens/destaques/imagem_3585.jpeg', 'asdsd', '2018-04-17 01:34:04', '2018-04-17 02:54:58');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2018_05_15_203933_create_roles_permissions_table', '1');

-- ----------------------------
-- Table structure for passeios
-- ----------------------------
DROP TABLE IF EXISTS `passeios`;
CREATE TABLE `passeios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `texto` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `valor_adulto_alta` double DEFAULT NULL,
  `valor_adulto_baixa` double DEFAULT NULL,
  `valor_chd_alta` double DEFAULT NULL,
  `valor_chd_baixa` double DEFAULT NULL,
  `ativo` enum('n','s') DEFAULT 's',
  `imagem` text,
  PRIMARY KEY (`id`),
  KEY `categoria` (`id_categoria`),
  CONSTRAINT `categoria` FOREIGN KEY (`id_categoria`) REFERENCES `passeios_categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of passeios
-- ----------------------------
INSERT INTO `passeios` VALUES ('44', '4', 'asdasd', '<p>asdasdasd</p>', '2018-04-19 01:54:13', '2018-04-19 01:54:13', '10', '20', '30', '40', 's', null);

-- ----------------------------
-- Table structure for passeios_categorias
-- ----------------------------
DROP TABLE IF EXISTS `passeios_categorias`;
CREATE TABLE `passeios_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `ativo` enum('s','n') DEFAULT 's',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of passeios_categorias
-- ----------------------------
INSERT INTO `passeios_categorias` VALUES ('1', 'Cachoeiras', 's');
INSERT INTO `passeios_categorias` VALUES ('2', 'Grutas', 's');
INSERT INTO `passeios_categorias` VALUES ('3', 'Flutuações', 's');
INSERT INTO `passeios_categorias` VALUES ('4', 'Aventuras', 's');
INSERT INTO `passeios_categorias` VALUES ('5', 'Mergulho Autônomo e Rapel', 's');
INSERT INTO `passeios_categorias` VALUES ('6', 'Balneários', 's');
INSERT INTO `passeios_categorias` VALUES ('7', 'Fazendas', 's');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'admin.dashboard', 'Dashboard', '2018-05-15 16:50:06', '2018-05-15 16:50:12');
INSERT INTO `permissions` VALUES ('2', 'admin.conteudo.canais', 'Canais [Listar]', '2018-05-15 16:50:06', '2018-05-15 16:50:06');
INSERT INTO `permissions` VALUES ('3', 'admin.conteudo.canais.cadastrar', 'Canais [Cadastrar]', '2018-05-15 16:50:06', '2018-05-15 16:50:06');
INSERT INTO `permissions` VALUES ('4', 'register', 'Registrar', null, null);
INSERT INTO `permissions` VALUES ('6', 'admin.root.usuarios', 'Usuarios [Listar]', null, null);

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('2', '2');
INSERT INTO `permission_role` VALUES ('2', '3');
INSERT INTO `permission_role` VALUES ('3', '6');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'root', 'Super Admin', '2018-05-15 16:50:37', '2018-05-15 16:50:39');
INSERT INTO `roles` VALUES ('2', 'admin', 'Admin', '2018-05-15 16:50:37', '2018-05-15 16:50:39');
INSERT INTO `roles` VALUES ('3', 'grupo_financeiro', 'Financeiro', '2018-05-15 16:50:37', '2018-05-15 16:50:39');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('2', '1');
INSERT INTO `role_user` VALUES ('2', '2');
INSERT INTO `role_user` VALUES ('4', '2');
INSERT INTO `role_user` VALUES ('1', '3');
INSERT INTO `role_user` VALUES ('2', '3');
INSERT INTO `role_user` VALUES ('3', '3');

-- ----------------------------
-- Table structure for roteiros_apartamentos
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_apartamentos`;
CREATE TABLE `roteiros_apartamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `valor_alta` double DEFAULT NULL,
  `valor_baixa` double DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_apartamentos
-- ----------------------------
INSERT INTO `roteiros_apartamentos` VALUES ('19', 'Apartamentoss', '230', '100', '<p>sadfff</p>');
INSERT INTO `roteiros_apartamentos` VALUES ('20', 'Apartamento', '226', '160', '');
INSERT INTO `roteiros_apartamentos` VALUES ('21', 'Apartamento', '339', '240', '');
INSERT INTO `roteiros_apartamentos` VALUES ('22', 'Apartamento', '420', '316', '');
INSERT INTO `roteiros_apartamentos` VALUES ('23', 'Apartamento', '475', '375', '');
INSERT INTO `roteiros_apartamentos` VALUES ('24', 'Apartamento', '250', '150', '');
INSERT INTO `roteiros_apartamentos` VALUES ('25', 'Apartamento', '245', '180', '');
INSERT INTO `roteiros_apartamentos` VALUES ('26', 'Apartamento', '367.5', '270', '');
INSERT INTO `roteiros_apartamentos` VALUES ('27', 'Apartamento', '460', '346', '');
INSERT INTO `roteiros_apartamentos` VALUES ('28', 'Apartamento', '550', '415', '');
INSERT INTO `roteiros_apartamentos` VALUES ('29', 'tetetet', null, null, null);

-- ----------------------------
-- Table structure for roteiros_clientes
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_clientes`;
CREATE TABLE `roteiros_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `numero_adultos` int(11) DEFAULT NULL,
  `numero_chd` int(11) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  `dthr_solicitacao` datetime DEFAULT NULL,
  `id_transporte` int(11) DEFAULT '0',
  `valor_transporte` double DEFAULT NULL,
  `id_apartamento` int(11) DEFAULT '0',
  `valor_apartamento_adultos` double DEFAULT NULL,
  `valor_apartamento_chd` double DEFAULT NULL,
  `id_pagamento` int(11) DEFAULT NULL,
  `dthr_lido` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `apartamentos` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5851 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_clientes
-- ----------------------------
INSERT INTO `roteiros_clientes` VALUES ('3163', 'VICTOR HUGO VENTURA TORREZ', '41-98628078', 'CURITIBA', 'victorventura1@hotmail.com', '2', '2', '2016-01-15', '2016-01-20', null, '1', null, '26', null, null, null, '2015-12-12 10:12:06');
INSERT INTO `roteiros_clientes` VALUES ('3164', 'FERNANDA', '11979560566', 'SÃO PAULO', 'fernanda.monteiro7@hotmail.com', '2', '0', '2016-01-09', '2016-01-15', null, '4', null, '20', null, null, null, '2015-12-12 10:38:51');

-- ----------------------------
-- Table structure for roteiros_configuracaos
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_configuracaos`;
CREATE TABLE `roteiros_configuracaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_transporte` int(11) DEFAULT NULL,
  `valor_transporte` double DEFAULT NULL,
  `id_apartamento` int(11) DEFAULT NULL,
  `valor_apartamento_adultos` double DEFAULT NULL,
  `valor_apartamento_chd` double DEFAULT NULL,
  `id_pagamento` int(11) DEFAULT NULL,
  `dthr_lido` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lido` enum('s','n') DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `cliente` (`id_cliente`),
  KEY `transportes` (`id_transporte`),
  KEY `apartamento` (`id_apartamento`),
  CONSTRAINT `apartamento` FOREIGN KEY (`id_apartamento`) REFERENCES `roteiros_apartamentos` (`id`),
  CONSTRAINT `cliente` FOREIGN KEY (`id_cliente`) REFERENCES `roteiros_clientes` (`id`),
  CONSTRAINT `transportes` FOREIGN KEY (`id_transporte`) REFERENCES `roteiros_transportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_configuracaos
-- ----------------------------

-- ----------------------------
-- Table structure for roteiros_configuracao_passeios
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_configuracao_passeios`;
CREATE TABLE `roteiros_configuracao_passeios` (
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `id_passeio` int(11) NOT NULL DEFAULT '0',
  `valor_passeio_adulto` double DEFAULT NULL,
  `valor_passeio_chd` double DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`id_passeio`),
  KEY `passeios` (`id_passeio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_configuracao_passeios
-- ----------------------------

-- ----------------------------
-- Table structure for roteiros_formas_pagamentos
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_formas_pagamentos`;
CREATE TABLE `roteiros_formas_pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_formas_pagamentos
-- ----------------------------
INSERT INTO `roteiros_formas_pagamentos` VALUES ('1', 'Sinal de 30% - Para confirmação da reserva.\r\nSaldo de 70% - No Check in na Pousada em Bonito');

-- ----------------------------
-- Table structure for roteiros_transportes
-- ----------------------------
DROP TABLE IF EXISTS `roteiros_transportes`;
CREATE TABLE `roteiros_transportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roteiros_transportes
-- ----------------------------
INSERT INTO `roteiros_transportes` VALUES ('1', ' Não Obrigado, vou com transporte próprio', null);
INSERT INTO `roteiros_transportes` VALUES ('2', 'Aluguel de Carro conforme disponibilidade de modelo - Diária R$ 150,00 ( Completo)', '150');
INSERT INTO `roteiros_transportes` VALUES ('3', 'Transfer Privativo (carro com ar condicionado + combustível incluso + motorista treinado) Campo Grande/Bonito/Campo Grande R$ 800,00 (não há necessidade de espera, possuímos logística de transporte com a chegada de seu voô).', '800');
INSERT INTO `roteiros_transportes` VALUES ('4', '* Horário do Transporte Campo Grande x Bonito  - Saídas previstas de Campo Grande as 09:30 - 14:30 -  18:00 - 23:00 hs - R$ 100,00\r\n\r\n\r\n* Horário do Transporte Bonito x Campo Grande - Saídas previstas de Bonito as  07:30 - 10:00 - 12:30 - 18:30 hs - R$ 100,00', '100');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Clayton Guerini', 'clayton.guerini@gmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', 'j5bBHOpFdj445s29YZlEFtkqL264J1d4eT6z9TwgqUVqKNo73nwsapL78DOg', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('2', 'Diego Tavares', 'diegocostatavares@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', 'Q1idMgWn9r1P7fpobhRdXo8PYGV3RKYy6sSFUUePBYoGRY2QaCuql9YR1zuE', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('3', 'Visitante 1', 'visitante1@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', null, '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('4', 'Visitante 2', 'visitante2@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('5', 'Visitante 3', 'visitante3@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('6', 'Visitante 4', 'visitante4@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('7', 'Visitante 5', 'visitante5@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('8', 'Visitante 6', 'visitante6@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('9', 'Visitante 7', 'visitante7@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('10', 'Visitante 8', 'visitante8@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
INSERT INTO `users` VALUES ('11', 'Visitante 9', 'visitante9@hotmail.com', '$2y$10$kMsVDyesKlkvB8hLZa/ZoOlbvvpimi8MRr3pxuX3HgoCvoPMXjFtW', '', '2018-04-11 00:55:29', '2018-04-11 00:55:29');
