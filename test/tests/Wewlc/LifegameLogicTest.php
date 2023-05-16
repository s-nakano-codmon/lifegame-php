<?php
namespace Wewlc;

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../../src/html/lifegame_logic.php';

class LifegameLogicTest extends TestCase
{
    /**
     * @test
     * @small
     * @group characterization
     */
    public function 初期表示_前世代の盤面番号(): void
    {
        // Act
        list($generation, $boardElement, $boardNumber) = run_lifegame_initial();

        // Assert
        $this->assertSame(1, $generation);

    }


    /**
     * @test
     * @small
     * @group characterization
     */
    public function 初期表示_盤面の描画(): void
    {
        // Act
        list($prevBoardNumber, $boardElement, $boardNumber) = run_lifegame_initial();

        $this->assertSame([
            ["□", "□", "□", "□", "□"],
            ["□", "□", "□", "□", "□"],
            ["□", "■", "■", "■", "□"],
            ["□", "□", "□", "□", "□"],
            ["□", "□", "□", "□", "□"],
        ], $boardElement);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function 初期表示_次世代の盤面番号(): void
    {
        // Act
        list($generation, $boardElement, $boardNumber) = run_lifegame_initial();

        $this->assertSame("00000900000901110900000900000", $boardNumber);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _2回目の表示_前世代の盤面番号(): void
    {
        // Act
        $prevBoardNumber = "";
        $generation = '2';
        list($generation, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        // Assert
        $this->assertSame(2, $generation);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _2回目の表示_盤面の描画(): void
    {
        // Act
        $prevBoardNumber = "00000900000901110900000900000";
        $generation = '2';
        list($prevBoardNumber, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        $this->assertSame([
            ["□", "□", "□", "□", "□"],
            ["□", "□", "■", "□", "□"],
            ["□", "□", "■", "□", "□"],
            ["□", "□", "■", "□", "□"],
            ["□", "□", "□", "□", "□"],
        ], $boardElement);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _2回目の表示_次世代の盤面番号(): void
    {
        // Act
        $prevBoardNumber = "00000900000901110900000900000";
        $generation = '2';
        list($generation, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        $this->assertSame("00000900100900100900100900000", $boardNumber);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _3回目の表示_前世代の盤面番号(): void
    {
        // Act
        $prevBoardNumber = "";
        $generation = '3';
        list($generation, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        // Assert
        $this->assertSame(3, $generation);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _3回目の表示_盤面の描画(): void
    {
        // Act
        $prevBoardNumber = "00000900100900100900100900000";
        $generation = '3';
        list($prevBoardNumber, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        $this->assertSame([
            ["□", "□", "□", "□", "□"],
            ["□", "□", "□", "□", "□"],
            ["□", "■", "■", "■", "□"],
            ["□", "□", "□", "□", "□"],
            ["□", "□", "□", "□", "□"],
        ], $boardElement);

    }

    /**
     * @test
     * @small
     * @group characterization
     */
    public function _3回目の表示_次世代の盤面番号(): void
    {
        // Act
        $prevBoardNumber = "00000900100900100900100900000";
        $generation = '2';
        list($generation, $boardElement, $boardNumber) = run_lifegame_second_more($prevBoardNumber, $generation);

        $this->assertSame("00000900000901110900000900000", $boardNumber);

    }

}
