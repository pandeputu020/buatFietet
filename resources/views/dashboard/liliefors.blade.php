@foreach ($zScores as $scoreId => $data)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $data['scoreValue'] }}</td>
    <td>{{ $data['zScore'] }}</td>
    <td>{{ $data['normsdist'] }}</td>
    <td>{{ $data['empiricalCumulativeProbability'] }}</td>
    <td>{{ $data['fx'] }}</td>
</tr>
@endforeach