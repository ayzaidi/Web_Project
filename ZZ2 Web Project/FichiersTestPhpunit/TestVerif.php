<?php
	require_once("verif.php");
	
	class TestVerif extends PHPUnit_Framework_TestCase {
		
		public function setUp()
		{
			echo "I run before each test\n";
		}
		
		public function testVerifPseudoRightTest()
		{
			echo "Running VerifPseudoRightTest\n";
			$login= "Ayoub";
			$resultat = verifLog($login);
			
			$this->assertEquals(0,$resultat);
		}
		
		public function testVerifPseudoWithBlankTest()
		{
			echo "Running VerifPseudoWithBlankTest\n";
			$login= "Ayoub Zaidi";
			$resultat = verifLog($login);
			
			$this->assertEquals(2,$resultat);
		}
		
		public function testLogRegisterTestOpen()
		{
			echo "Running First Part of LogRegisterTest : Opening file Liste_Log.txt\n";
			$login= "Ayoub";
			
			$resultat = LogRegister($login);
			$this->assertEquals(0,$resultat);
		}
		
		public function testLogRegisterTestWrite()
		{
			echo "Running Second Part of LogRegisterTest : Write in Liste_Log.txt\n";
			
			$login= "Ayoub";
			$fileTest = fopen("Liste_Log_Test.txt","a"); //le fichier texte Liste_Log_Test.txt contient seulement le pseudo Ayoub en premi�re ligne
			LogRegister($login);
			
			
			$this->assertFileEquals("Liste_Log_Test.txt","Liste_Log.txt");
				
		}	
			
			
		public function testVerifPseudoAlreadyTaken()
		{
			echo "Running VerifPseudoAlreadyTaken\n";
			$login= "Ayoub";
			
			LogRegister($login);
			$resultat = verifLog($login);
			
			$this->assertEquals(1,$resultat);
		}
		
		public function tearDown()
		{
			echo "I run after each test\n";
		}
		
	}
	
?>
		
		