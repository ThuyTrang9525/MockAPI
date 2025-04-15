import { useState } from 'react';

function Square({ value, onSquareClick }) {
  return (
    <button className="square" onClick={onSquareClick}>
      {value}
    </button>
  );
}

function Board({ xIsNext, squares, onPlay }) {
  function handleClick(i) {
    if (calculateWinner(squares) || squares[i]) return;
    const nextSquares = squares.slice();
    nextSquares[i] = xIsNext ? 'X' : 'O';
    onPlay(nextSquares);
  }

  const winner = calculateWinner(squares);
  const status = winner ? 'Winner: ' + winner : 'Next player: ' + (xIsNext ? 'X' : 'O');

  const boardRows = [];
  for (let row = 0; row < 5; row++) {
    const squaresInRow = [];
    for (let col = 0; col < 5; col++) {
      const index = row * 5 + col;
      squaresInRow.push(
        <Square key={index} value={squares[index]} onSquareClick={() => handleClick(index)} />
      );
    }
    boardRows.push(
      <div key={row} className="board-row">
        {squaresInRow}
      </div>
    );
  }

  return (
    <>
      <div className="status">{status}</div>
      {boardRows}
    </>
  );
}

export default function Game() {
  const [history, setHistory] = useState([Array(25).fill(null)]);
  const [currentMove, setCurrentMove] = useState(0);
  const xIsNext = currentMove % 2 === 0;
  const currentSquares = history[currentMove];

  function handlePlay(nextSquares) {
    const nextHistory = [...history.slice(0, currentMove + 1), nextSquares];
    setHistory(nextHistory);
    setCurrentMove(nextHistory.length - 1);
  }

  function jumpTo(nextMove) {
    setCurrentMove(nextMove);
  }

  const moves = history.map((squares, move) => {
    const description = move ? 'Go to move #' + move : 'Go to game start';
    return (
      <li key={move}>
        <button onClick={() => jumpTo(move)}>{description}</button>
      </li>
    );
  });

  return (
    <div className="game">
      <div className="game-board">
        <Board xIsNext={xIsNext} squares={currentSquares} onPlay={handlePlay} />
      </div>
      <div className="game-info">
        <ol>{moves}</ol>
      </div>
    </div>
  );
}

function calculateWinner(squares) {
  const size = 5;
  const winLength = 5;

  const checkLine = (start, step) => {
    const first = squares[start];
    if (!first) return null;
    for (let i = 1; i < winLength; i++) {
      if (squares[start + i * step] !== first) return null;
    }
    return first;
  };

  // Check rows
  for (let row = 0; row < size; row++) {
    for (let col = 0; col <= size - winLength; col++) {
      const start = row * size + col;
      const result = checkLine(start, 1);
      if (result) return result;
    }
  }

  // Check columns
  for (let col = 0; col < size; col++) {
    for (let row = 0; row <= size - winLength; row++) {
      const start = row * size + col;
      const result = checkLine(start, size);
      if (result) return result;
    }
  }

  // Check diagonals (\)
  for (let row = 0; row <= size - winLength; row++) {
    for (let col = 0; col <= size - winLength; col++) {
      const start = row * size + col;
      const result = checkLine(start, size + 1);
      if (result) return result;
    }
  }

  // Check diagonals (/)
  for (let row = 0; row <= size - winLength; row++) {
    for (let col = winLength - 1; col < size; col++) {
      const start = row * size + col;
      const result = checkLine(start, size - 1);
      if (result) return result;
    }
  }

  return null;
}
