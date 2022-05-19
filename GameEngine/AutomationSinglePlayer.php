<?php

class AutomationSinglePlayer {

    public function AutomationSinglePlayer() {
        global $database, $session;
        //send NPC hero to adventure and sell items on auction
        if (!file_exists("GameEngine/Prevention/adventures.txt") or time() - filemtime("GameEngine/Prevention/adventures.txt") > 50) {
            $adv_time = 86400 / ADVENTURE_SPEED;
            if ($database->hasActiveAdventures( $adv_time, $session->uid )) {
                $this->sendAdventuresComplete();
            }
        }
    }

    private function createNpcHeroIfNotExists($uid) {
        global $database;
        $getHero = $database->getHero($uid);
        if ($getHero == false) {
            $database->addHero($uid);
        }
    }

    private function sendAdventuresComplete() {
        if (file_exists("GameEngine/Prevention/adventures.txt")) {
            unlink("GameEngine/Prevention/adventures.txt");
        }
        $traderUid = 2;
        $this->createNpcHeroIfNotExists($traderUid);

        global $database, $session;
        $time = time();
        $tribe = $database->getUserField($session->uid, 'tribe', 0);
        if ($tribe < 1 || $tribe > 3) {
            $tribe = 1;
        }

        $ownerID = $traderUid; //Natars uid =2

        $btype = rand(0, 15);

        if ($btype == 1) {
            if ($time >= (COMMENCE + 604800)) {
                $ntype = array(1 => 1, 2, 4, 5, 7, 8, 10, 11, 13, 14);
            } elseif ($time >= (COMMENCE + 1209600)) {
                $ntype = array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
            } else {
                $ntype = array(1 => 1, 4, 7, 10, 13);
            }
        } /* elseif($btype==2){
          if($time >= (COMMENCE+604800)){
          $ntype = array(1=>82,83,85,86,88,89,91,92);
          }
          elseif($time >= (COMMENCE+1209600)){
          $ntype = array(1=>82,83,84,85,86,87,88,89,90,91,92,93);
          }
          else{
          $ntype = array(1=>82,85,88,91);
          }
          } */ elseif ($btype == 3) {
            if ($time >= (COMMENCE + 604800)) {
                $ntype = array(1 => 61, 62, 64, 65, 67, 68, 73, 74, 79, 80);
            } elseif ($time >= (COMMENCE + 1209600)) {

                $ntype = array(1 => 61, 62, 63, 64, 65, 66, 67, 68, 69, 73, 74, 75, 76, 77, 78, 79, 80, 81);
            } else {
                $ntype = array(1 => 61, 64, 67, 73, 79);
            }
        } elseif ($btype == 4) {
            if ($time >= (COMMENCE + 604800)) {
                if ($tribe == 1) {
                    $ntype = array(1 => 16, 17, 19, 20, 22, 23, 25, 26, 28, 29);
                } elseif ($tribe == 2) {
                    $ntype = array(1 => 46, 47, 49, 50, 52, 53, 55, 56, 58, 59);
                } elseif ($tribe == 3) {
                    $ntype = array(1 => 31, 32, 34, 35, 37, 38, 40, 41, 43, 44);
                }
            } elseif ($time >= (COMMENCE + 1209600)) {
                if ($tribe == 1) {
                    $ntype = array(1 => 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30);
                } elseif ($tribe == 2) {
                    $ntype = array(1 => 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60);
                } elseif ($tribe == 3) {
                    $ntype = array(1 => 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45);
                }
            } else {
                if ($tribe == 1) {
                    $ntype = array(1 => 16, 19, 22, 25, 28);
                } elseif ($tribe == 2) {
                    $ntype = array(1 => 46, 49, 52, 55, 58);
                } elseif ($tribe == 3) {
                    $ntype = array(1 => 31, 34, 37, 40, 43);
                }
            }
        } elseif ($btype == 5) {
            if ($time >= (COMMENCE + 604800)) {
                $ntype = array(1 => 94, 95, 97, 98, 100, 101);
            } elseif ($time >= (COMMENCE + 1209600)) {
                $ntype = array(1 => 94, 95, 96, 98, 99, 100, 101, 102);
            } else {
                $ntype = array(1 => 94, 97, 100);
            }
        } elseif ($btype == 6) {
            if ($time >= (COMMENCE + 604800)) {
                $ntype = array(1 => 103, 104);
            } elseif ($time >= (COMMENCE + 1209600)) {
                $ntype = array(1 => 103, 104, 105);
            } else {
                $ntype = array(1 => 103);
            }
        } elseif ($btype >= 7) {
            $ntype = array(7 => 112, 113, 114, 107, 106, 108, 110, 109, 111);
        }

        if ($btype >= 7) {
            $nntype = $ntype[$btype];
            if ($btype == 9) {
                $num = rand(6, 20);
            } elseif ($btype == 12 or $btype == 13 or $btype == 15) {
                $num = 1;
            } else {
                $num = rand(20, 50);
            }
            /* if($btype <= 11 or $btype >= 14) {
              if($database->checkHeroItem($ownerID, $btype)) {
              $id = $database->getHeroItemID($ownerID, $btype);
              $database->editHeroNum($id, $num, 1);
              } else {
              $database->addHeroItem($ownerID, $btype, $nntype, $num);
              }
              } else { */
            $database->addHeroItem($ownerID, $btype, $nntype, $num);
            /* } */
        } else {
            if ($btype == 1 or $btype > 2) {
                $num = 1;
                $s2 = rand(1, count($ntype));
                $nntype = $ntype[$s2];
                $database->addHeroItem($ownerID, $btype, $nntype, $num);
            }
        }
        $q = "SELECT * FROM " . TB_PREFIX . "heroitems WHERE uid = '$ownerID' and proc = 0";
        $dataarray = $database->query_return($q);
        foreach ($dataarray as $data) {
            $database->addAuction($ownerID, $data['id'], $data['btype'], $data['type'], $data['num']);
        }

        if (file_exists("GameEngine/Prevention/adventures.txt")) {
            unlink("GameEngine/Prevention/adventures.txt");
        }
    }

}

$automationSinglePlayer = new AutomationSinglePlayer;
?>
